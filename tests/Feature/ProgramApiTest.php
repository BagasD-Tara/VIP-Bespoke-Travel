<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Program;

class ProgramApiTest extends TestCase
{
    /**
     * Test 1: GET /api/programs - Mengambil seluruh data program dalam format JSON (200 OK)
     */
    public function test_api_get_all_programs_returns_200(): void
    {
        $response = $this->getJson('/api/programs');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'message',
            'total',
            'data' => [
                '*' => [
                    'id',
                    'nama',
                    'deskripsi',
                    'created_at',
                    'updated_at'
                ]
            ]
        ]);
    }

    /**
     * Test 2: POST /api/programs - Berhasil membuat program baru dengan data valid (201 Created)
     */
    public function test_api_create_program_valid_data_returns_201(): void
    {
        $payload = [
            'nama' => 'St. Moritz Heli-Skiing & Private Chalet',
            'deskripsi' => 'Pengalaman ski mewah di puncak Alpen dengan akses helikopter privat.'
        ];

        $response = $this->postJson('/api/programs', $payload);

        $response->assertStatus(201);
        $response->assertJson([
            'status' => 'success',
            'data' => [
                'nama' => 'St. Moritz Heli-Skiing & Private Chalet'
            ]
        ]);

        $this->assertDatabaseHas('programs', [
            'nama' => 'St. Moritz Heli-Skiing & Private Chalet'
        ]);
    }

    /**
     * Test 3: POST /api/programs - Validasi gagal saat field kosong (422 Unprocessable Entity)
     */
    public function test_api_create_program_validation_fails_empty_fields_returns_422(): void
    {
        $payload = [
            'nama' => '',
            'deskripsi' => ''
        ];

        $response = $this->postJson('/api/programs', $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nama', 'deskripsi']);
    }

    /**
     * Test 4: POST /api/programs - Validasi gagal saat nama > 100 karakter (422 Unprocessable Entity)
     */
    public function test_api_create_program_validation_fails_max_100_chars_returns_422(): void
    {
        $payload = [
            'nama' => str_repeat('A', 105), // 105 karakter (melebihi max:100)
            'deskripsi' => 'Deskripsi program yang valid.'
        ];

        $response = $this->postJson('/api/programs', $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nama']);
    }

    /**
     * Test 5: GET /api/programs/{id} - Mengambil detail program berdasarkan ID (200 OK)
     */
    public function test_api_get_single_program_detail_returns_200(): void
    {
        $program = Program::first();

        $response = $this->getJson("/api/programs/{$program->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'data' => [
                'id' => $program->id,
                'nama' => $program->nama
            ]
        ]);
    }

    /**
     * Test 6: GET /api/programs/{id} - 404 Not Found saat ID tidak ditemukan
     */
    public function test_api_get_single_program_not_found_returns_404(): void
    {
        $response = $this->getJson('/api/programs/99999');

        $response->assertStatus(404);
        $response->assertJson([
            'status' => 'error'
        ]);
    }

    /**
     * Test 7: PUT /api/programs/{id} - Memperbarui program dengan data valid (200 OK)
     */
    public function test_api_update_program_valid_data_returns_200(): void
    {
        $program = Program::first();

        $payload = [
            'nama' => 'Alpine Swiss Sanctuary (Premier Edition)',
            'deskripsi' => 'Kurasi chalet privat musim dingin yang telah diperbarui.'
        ];

        $response = $this->putJson("/api/programs/{$program->id}", $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'data' => [
                'id' => $program->id,
                'nama' => 'Alpine Swiss Sanctuary (Premier Edition)'
            ]
        ]);

        $this->assertDatabaseHas('programs', [
            'id' => $program->id,
            'nama' => 'Alpine Swiss Sanctuary (Premier Edition)'
        ]);
    }

    /**
     * Test 8: PUT /api/programs/{id} - Validasi gagal saat update jika nama > 100 karakter (422)
     */
    public function test_api_update_program_validation_fails_max_100_returns_422(): void
    {
        $program = Program::first();

        $payload = [
            'nama' => str_repeat('X', 101),
            'deskripsi' => 'Deskripsi valid'
        ];

        $response = $this->putJson("/api/programs/{$program->id}", $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['nama']);
    }

    /**
     * Test 9: DELETE /api/programs/{id} - Berhasil menghapus program (200 OK)
     */
    public function test_api_delete_program_returns_200(): void
    {
        $program = Program::create([
            'nama' => 'Program Uji Delete API',
            'deskripsi' => 'Data sementara untuk pengujian endpoint delete.'
        ]);

        $response = $this->deleteJson("/api/programs/{$program->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success'
        ]);

        $this->assertDatabaseMissing('programs', [
            'id' => $program->id
        ]);
    }

    /**
     * Test 10: DELETE /api/programs/{id} - 404 Not Found saat menghapus ID yang tidak ada
     */
    public function test_api_delete_program_not_found_returns_404(): void
    {
        $response = $this->deleteJson('/api/programs/99999');

        $response->assertStatus(404);
        $response->assertJson([
            'status' => 'error'
        ]);
    }
}
