<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Program;

class ProgramCrudTest extends TestCase
{
    /**
     * Test: READ - Menampilkan daftar program ekspedisi pada route '/' dan '/programs'
     */
    public function test_can_view_program_list(): void
    {
        $response = $this->get('/programs');
        $response->assertStatus(200);
        $response->assertSee('Curated Bespoke Programs');
        $response->assertSee('Alpine Swiss Sanctuary');
    }

    /**
     * Test: READ - Menampilkan halaman form tambah program
     */
    public function test_can_view_create_page(): void
    {
        $response = $this->get('/programs/create');
        $response->assertStatus(200);
        $response->assertSee('Inisiasi Program Ekspedisi Baru');
    }

    /**
     * Test: CREATE - Menyimpan program baru ke database
     */
    public function test_can_store_new_program(): void
    {
        $data = [
            'nama' => 'French Riviera Yacht & Heli Charter',
            'deskripsi' => 'Pengalaman berlayar mewah di sepanjang Cote d\'Azur dengan koki privat dan transfer helikopter Monaco.'
        ];

        $response = $this->post('/programs', $data);
        $response->assertRedirect('/programs');

        $this->assertDatabaseHas('programs', [
            'nama' => 'French Riviera Yacht & Heli Charter'
        ]);
    }

    /**
     * Test: UPDATE - Menampilkan halaman edit dan memperbarui data
     */
    public function test_can_update_program(): void
    {
        $program = Program::first();

        $response = $this->get("/programs/{$program->id}/edit");
        $response->assertStatus(200);

        $updateData = [
            'nama' => 'Alpine Swiss Sanctuary & Winter Heli-Chalet (Updated Edition)',
            'deskripsi' => 'Edisi diperbarui dengan akses ski resort privat dan fasilitas wellness eksklusif.'
        ];

        $putResponse = $this->put("/programs/{$program->id}", $updateData);
        $putResponse->assertRedirect('/programs');

        $this->assertDatabaseHas('programs', [
            'id' => $program->id,
            'nama' => 'Alpine Swiss Sanctuary & Winter Heli-Chalet (Updated Edition)'
        ]);
    }

    /**
     * Test: DELETE - Menghapus data program dari database
     */
    public function test_can_delete_program(): void
    {
        $program = Program::create([
            'nama' => 'Ekspedisi Sementara Testing',
            'deskripsi' => 'Akan dihapus pada saat verifikasi automated test.'
        ]);

        $deleteResponse = $this->delete("/programs/{$program->id}");
        $deleteResponse->assertRedirect('/programs');

        $this->assertDatabaseMissing('programs', [
            'id' => $program->id
        ]);
    }

    /**
     * Test: Uji Eloquent Endpoint (Task 02)
     */
    public function test_uji_eloquent_endpoint(): void
    {
        $response = $this->get('/uji-eloquent');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success'
        ]);
    }
}
