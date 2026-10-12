const TOKEN_KEY = "bespoke_token";
// DOM Elements
const customerGreetingEl = document.getElementById("customer-greeting");
const businessNameEl = document.getElementById("business-name");
const apiStatusContainerEl = document.getElementById("api-status-container");
const btnRefreshEl = document.getElementById("btn-refresh-dashboard");
const refreshIconEl = document.getElementById("refresh-icon");
const actionItemsListEl = document.getElementById("action-items-list");
const requestsListEl = document.getElementById("requests-list");
const upcomingCardEl = document.getElementById("upcoming-card");
const messagesListEl = document.getElementById("messages-list");
const newRequestModalEl = document.getElementById("new-request-modal");
const openModalBtn = document.getElementById("btn-new-request");
const closeModalBtn = document.getElementById("btn-close-modal");
const cancelModalBtn = document.getElementById("btn-cancel-modal");
const newRequestForm = document.getElementById("new-request-form");
const modalFeedbackEl = document.getElementById("modal-feedback");
const btnSubmitRequest = document.getElementById("btn-submit-request");
const btnSubmitText = document.getElementById("btn-submit-text");
const logoutBtn = document.getElementById("btn-logout");
const toastContainerEl = document.getElementById("toast-container");
// Application State
const dashboardState = {
    status: "idle",
    data: null,
    error: null,
};
// Helper: Escape HTML
function escapeHtml(str) {
    return str
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}
// ---------------------------------------------------------------------------
// TOAST NOTIFICATION SYSTEM (Feedback Visual)
// ---------------------------------------------------------------------------
export function showToast(type, title, message, duration = 4000) {
    if (!toastContainerEl)
        return null;
    const toast = document.createElement("div");
    toast.className = `toast toast-${type}`;
    let iconSvg = "";
    if (type === "success") {
        iconSvg = `<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>`;
    }
    else if (type === "error") {
        iconSvg = `<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>`;
    }
    else if (type === "loading") {
        iconSvg = `<div class="toast-icon flex items-center justify-center">
      <span class="spinner spinner-dark !w-4 !h-4"></span>
    </div>`;
    }
    else {
        iconSvg = `<svg class="toast-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
    </svg>`;
    }
    toast.innerHTML = `
    ${iconSvg}
    <div class="flex-1 min-w-0 pr-2">
      <h5 class="text-xs font-bold text-slate-800 leading-tight">${escapeHtml(title)}</h5>
      <p class="text-xs text-slate-500 mt-0.5 leading-snug">${escapeHtml(message)}</p>
    </div>
    <button class="text-slate-400 hover:text-slate-600 text-sm font-bold ml-1 leading-none">&times;</button>
  `;
    const closeBtn = toast.querySelector("button");
    const dismiss = () => {
        toast.classList.add("toast-closing");
        setTimeout(() => {
            if (toast.parentElement)
                toast.remove();
        }, 250);
    };
    closeBtn?.addEventListener("click", dismiss);
    toastContainerEl.appendChild(toast);
    if (duration > 0) {
        setTimeout(dismiss, duration);
    }
    return toast;
}
// ---------------------------------------------------------------------------
// API STATE RENDERERS (Loading Skeletons, Error Cards, Badges)
// ---------------------------------------------------------------------------
// 1. Update Header API Status Badge
function updateApiStatusBadge(status) {
    if (!apiStatusContainerEl)
        return;
    if (status === "loading") {
        apiStatusContainerEl.innerHTML = `
      <span class="api-badge api-badge-loading">
        <span class="spinner spinner-dark !w-3 !h-3"></span>
        <span>Memproses API...</span>
      </span>
    `;
        if (refreshIconEl)
            refreshIconEl.classList.add("animate-spin");
    }
    else if (status === "success") {
        apiStatusContainerEl.innerHTML = `
      <span class="api-badge api-badge-success">
        <span class="pulse-dot pulse-dot-green"></span>
        <span>REST API Terhubung</span>
      </span>
    `;
        if (refreshIconEl)
            refreshIconEl.classList.remove("animate-spin");
    }
    else if (status === "error") {
        apiStatusContainerEl.innerHTML = `
      <span class="api-badge api-badge-error">
        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
        </svg>
        <span>Gagal Sinkronisasi</span>
      </span>
    `;
        if (refreshIconEl)
            refreshIconEl.classList.remove("animate-spin");
    }
}
// 2. Render Loading Skeletons
function renderLoadingSkeletons() {
    updateApiStatusBadge("loading");
    if (actionItemsListEl) {
        actionItemsListEl.innerHTML = `
      <div class="p-5 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3.5 flex-1">
          <div class="skeleton w-11 h-11 !rounded-xl"></div>
          <div class="space-y-2 flex-1 max-w-xs">
            <div class="skeleton h-4 w-3/4"></div>
            <div class="skeleton h-3 w-1/2"></div>
          </div>
        </div>
        <div class="skeleton h-8 w-24 !rounded-lg"></div>
      </div>
      <div class="p-5 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3.5 flex-1">
          <div class="skeleton w-11 h-11 !rounded-xl"></div>
          <div class="space-y-2 flex-1 max-w-xs">
            <div class="skeleton h-4 w-2/3"></div>
            <div class="skeleton h-3 w-3/5"></div>
          </div>
        </div>
        <div class="skeleton h-6 w-16 !rounded-full"></div>
      </div>
    `;
    }
    if (requestsListEl) {
        requestsListEl.innerHTML = `
      <div class="p-5 bg-white rounded-2xl border border-slate-200/80 space-y-4">
        <div class="flex justify-between items-center">
          <div class="skeleton h-5 w-48"></div>
          <div class="skeleton h-6 w-24 !rounded-full"></div>
        </div>
        <div class="skeleton h-3 w-36"></div>
        <div class="skeleton h-3 w-full !rounded-full"></div>
        <div class="flex justify-between items-center pt-2">
          <div class="skeleton h-4 w-32"></div>
          <div class="skeleton h-4 w-16"></div>
        </div>
      </div>
    `;
    }
    if (upcomingCardEl) {
        upcomingCardEl.innerHTML = `
      <div class="flex items-center gap-4">
        <div class="skeleton w-14 h-14 !rounded-xl"></div>
        <div class="space-y-2 flex-1">
          <div class="skeleton h-4 w-32"></div>
          <div class="skeleton h-3 w-44"></div>
        </div>
      </div>
    `;
    }
    if (messagesListEl) {
        messagesListEl.innerHTML = `
      <div class="space-y-4 py-2">
        <div class="flex items-center gap-3">
          <div class="skeleton w-8 h-8 !rounded-full"></div>
          <div class="space-y-1.5 flex-1">
            <div class="skeleton h-3 w-28"></div>
            <div class="skeleton h-3 w-56"></div>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <div class="skeleton w-8 h-8 !rounded-full"></div>
          <div class="space-y-1.5 flex-1">
            <div class="skeleton h-3 w-28"></div>
            <div class="skeleton h-3 w-48"></div>
          </div>
        </div>
      </div>
    `;
    }
}
// 3. Render Error Feedback UI
function renderErrorState(errorMessage) {
    updateApiStatusBadge("error");
    const errorMarkup = `
    <div class="error-state-card">
      <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto mb-3">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
        </svg>
      </div>
      <h4 class="text-sm font-bold text-slate-800">Gagal Mengambil Data dari API</h4>
      <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto leading-relaxed">${escapeHtml(errorMessage)}</p>
      <div class="mt-4">
        <button class="btn-retry" id="btn-retry-action">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
          </svg>
          <span>Coba Hubungkan Ulang</span>
        </button>
      </div>
    </div>
  `;
    if (actionItemsListEl)
        actionItemsListEl.innerHTML = errorMarkup;
    if (requestsListEl)
        requestsListEl.innerHTML = errorMarkup;
    if (upcomingCardEl)
        upcomingCardEl.innerHTML = `<p class="text-xs text-rose-600 py-2">Gagal memuat jadwal perjalanan.</p>`;
    if (messagesListEl)
        messagesListEl.innerHTML = `<p class="text-xs text-rose-600 py-2">Gagal memuat pesan concierge.</p>`;
    // Attach retry handler to newly created retry button
    document.getElementById("btn-retry-action")?.addEventListener("click", () => {
        loadDashboardWithFeedback();
    });
    showToast("error", "Koneksi API Gagal", errorMessage);
}
// ---------------------------------------------------------------------------
// CONTENT RENDERERS (Success State)
// ---------------------------------------------------------------------------
function renderActionItems(items) {
    if (!actionItemsListEl)
        return;
    actionItemsListEl.innerHTML = items
        .map((item) => {
        const isProposal = item.type === "proposal";
        const iconMarkup = isProposal
            ? `<div class="action-icon action-icon-gold">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
           </div>`
            : `<div class="action-icon action-icon-mint">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
           </div>`;
        const rightControls = isProposal
            ? `<div class="flex items-center gap-3">
             <span class="badge-gold">${escapeHtml(item.badge)}</span>
             <button class="btn-primary-sm" onclick="alert('Membuka detail proposal v2...')">${escapeHtml(item.actionLabel || "Lihat Proposal")}</button>
           </div>`
            : `<div>
             <span class="badge-mint-outline">${escapeHtml(item.badge)}</span>
           </div>`;
        return `
        <div class="action-card flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 p-4 md:p-5">
          <div class="flex items-start sm:items-center gap-3.5">
            ${iconMarkup}
            <div>
              <h3 class="text-[15px] font-semibold text-slate-900 leading-snug">${escapeHtml(item.title)}</h3>
              <p class="text-xs sm:text-[13px] text-slate-500 mt-0.5">${escapeHtml(item.subtitle)}</p>
            </div>
          </div>
          <div class="self-end sm:self-auto shrink-0">
            ${rightControls}
          </div>
        </div>
      `;
    })
        .join("");
}
function renderRequests(requests) {
    if (!requestsListEl)
        return;
    if (requests.length === 0) {
        requestsListEl.innerHTML = `<div class="p-8 text-center text-sm text-slate-400 bg-white rounded-2xl border border-slate-200">Belum ada request perjalanan aktif.</div>`;
        return;
    }
    requestsListEl.innerHTML = requests
        .map((req) => {
        const isWarning = req.statusType === "warning";
        const statusBadgeClass = isWarning ? "badge-sand" : "badge-soft-blue";
        const stepsHtml = req.steps
            .map((stepName, idx) => {
            const isCompletedOrActive = idx <= req.currentStepIndex;
            const isCurrentActive = idx === req.currentStepIndex;
            const labelClass = isCurrentActive
                ? "font-bold text-slate-900"
                : isCompletedOrActive
                    ? "font-medium text-slate-700"
                    : "text-slate-400";
            const barClass = isCompletedOrActive ? "step-bar-active" : "step-bar-inactive";
            return `
            <div class="flex-1 flex flex-col items-center">
              <div class="step-bar ${barClass} w-full h-[3.5px] rounded-full mb-1.5"></div>
              <span class="step-label text-[11px] sm:text-xs ${labelClass}">${escapeHtml(stepName)}</span>
            </div>
          `;
        })
            .join("");
        let footerContent = "";
        if (req.footerType === "estimate") {
            footerContent = `
          <div class="flex items-center gap-2 text-xs sm:text-[13px] text-slate-600">
            <span>Estimasi biaya <strong class="text-slate-900">${escapeHtml(req.costEstimate || "Rp -")}</strong></span>
            <span class="badge-neutral">${escapeHtml(req.costBadge || "Estimasi")}</span>
          </div>
        `;
        }
        else {
            footerContent = `
          <div class="flex items-center gap-2 text-xs sm:text-[13px] text-slate-700 font-medium">
            <svg class="w-4 h-4 text-emerald-700" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
            </svg>
            <span>${escapeHtml(req.confirmedText || "Booking Confirmed")}</span>
          </div>
        `;
        }
        return `
        <div class="request-card p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm transition hover:shadow-md">
          <div class="flex items-start justify-between gap-3 mb-1">
            <h4 class="text-[15px] sm:text-base font-bold text-slate-900 leading-snug">${escapeHtml(req.destination)}</h4>
            <span class="${statusBadgeClass} shrink-0">${escapeHtml(req.statusBadge)}</span>
          </div>
          <p class="text-xs sm:text-[13px] text-slate-500 mb-5">${escapeHtml(req.dateRange)} • ${req.guests} peserta</p>

          <div class="steps-container flex items-center justify-between gap-1 sm:gap-2 mb-5">
            ${stepsHtml}
          </div>

          <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
            ${footerContent}
            <a href="#" class="text-xs sm:text-[13px] font-semibold text-emerald-800 hover:text-emerald-950 transition">Lihat detail</a>
          </div>
        </div>
      `;
    })
        .join("");
}
function renderUpcoming(trip) {
    if (!upcomingCardEl)
        return;
    upcomingCardEl.innerHTML = `
    <div class="flex items-center gap-4">
      <div class="date-tile flex flex-col items-center justify-center w-14 h-14 rounded-xl bg-[#e3efe9] text-[#164330] shrink-0 font-sans shadow-xs">
        <span class="text-base font-extrabold leading-tight">${escapeHtml(trip.dateDay)}</span>
        <span class="text-[11px] font-bold tracking-wider leading-none uppercase">${escapeHtml(trip.dateMonth)}</span>
      </div>
      <div>
        <h4 class="text-[15px] font-bold text-slate-900 leading-snug">${escapeHtml(trip.destination)}</h4>
        <p class="text-xs sm:text-[13px] text-slate-500 mt-0.5">${escapeHtml(trip.confirmedSummary)}</p>
      </div>
    </div>
  `;
}
function renderMessages(messages) {
    if (!messagesListEl)
        return;
    messagesListEl.innerHTML = messages
        .map((msg) => `
      <div class="flex items-start gap-3.5 py-2.5 first:pt-0 last:pb-0">
        <div class="w-8 h-8 rounded-full bg-[#e7eee9] text-[#244b36] flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">
          ${escapeHtml(msg.initial)}
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex items-baseline gap-2">
            <h5 class="text-xs sm:text-[13px] font-semibold text-slate-800 truncate">${escapeHtml(msg.sender)}</h5>
            <span class="text-[11px] text-slate-400 shrink-0">• ${escapeHtml(msg.time)}</span>
          </div>
          <p class="text-xs text-slate-500 mt-0.5 line-clamp-2 leading-relaxed">${escapeHtml(msg.message)}</p>
        </div>
      </div>
    `)
        .join("");
}
// ---------------------------------------------------------------------------
// DATA FETCHING WITH FULL API STATE HANDLING (Loading, Success, Error)
// ---------------------------------------------------------------------------
export async function loadDashboardWithFeedback(isSilent = false) {
    dashboardState.status = "loading";
    dashboardState.error = null;
    if (!isSilent) {
        renderLoadingSkeletons();
    }
    else {
        updateApiStatusBadge("loading");
    }
    const token = sessionStorage.getItem(TOKEN_KEY);
    const headers = {
        "Content-Type": "application/json",
    };
    if (token) {
        headers["Authorization"] = `Bearer ${token}`;
    }
    try {
        const response = await fetch("/api/dashboard", {
            method: "GET",
            headers,
        });
        if (response.status === 401) {
            sessionStorage.removeItem(TOKEN_KEY);
            window.location.href = "login.html";
            return;
        }
        let jsonResult;
        try {
            jsonResult = await response.json();
        }
        catch {
            throw new Error("Respon server bukan format JSON yang valid.");
        }
        if (!response.ok || !jsonResult.success || !jsonResult.data) {
            throw new Error(jsonResult.message || `Terjadi kesalahan (Kode status: ${response.status})`);
        }
        // Success State
        dashboardState.status = "success";
        dashboardState.data = jsonResult.data;
        // Render Data
        if (customerGreetingEl) {
            customerGreetingEl.textContent = `Halo, ${dashboardState.data.customer.name || "Customer"}`;
        }
        if (businessNameEl) {
            businessNameEl.textContent = dashboardState.data.business.name || "Bespoke";
        }
        renderActionItems(dashboardState.data.perluTindakan);
        renderRequests(dashboardState.data.requestSaya);
        renderUpcoming(dashboardState.data.perjalananMendatang);
        renderMessages(dashboardState.data.pesanTerbaru);
        updateApiStatusBadge("success");
        if (isSilent) {
            showToast("success", "Sinkronisasi Berhasil", "Data dashboard berhasil diperbarui dari API.");
        }
    }
    catch (err) {
        // Error State
        const errorMsg = err instanceof Error ? err.message : "Tidak dapat terhubung ke server.";
        dashboardState.status = "error";
        dashboardState.error = errorMsg;
        renderErrorState(errorMsg);
    }
}
// ---------------------------------------------------------------------------
// INTERACTION & MODAL SUBMIT WITH API STATE FEEDBACK
// ---------------------------------------------------------------------------
function setupInteractions() {
    // Manual refresh button
    btnRefreshEl?.addEventListener("click", () => {
        loadDashboardWithFeedback(true);
    });
    // Modal open & close
    openModalBtn?.addEventListener("click", () => {
        if (modalFeedbackEl) {
            modalFeedbackEl.className = "hidden";
            modalFeedbackEl.textContent = "";
        }
        newRequestModalEl?.classList.remove("hidden");
    });
    closeModalBtn?.addEventListener("click", () => {
        newRequestModalEl?.classList.add("hidden");
    });
    cancelModalBtn?.addEventListener("click", () => {
        newRequestModalEl?.classList.add("hidden");
    });
    newRequestModalEl?.addEventListener("click", (e) => {
        if (e.target === newRequestModalEl) {
            newRequestModalEl.classList.add("hidden");
        }
    });
    // Handle Submit New Request
    newRequestForm?.addEventListener("submit", async (e) => {
        e.preventDefault();
        const destinationInput = document.getElementById("req-destination");
        const dateRangeInput = document.getElementById("req-dates");
        const guestsInput = document.getElementById("req-guests");
        const notesInput = document.getElementById("req-notes");
        if (!destinationInput || !dateRangeInput || !btnSubmitRequest || !btnSubmitText)
            return;
        // 1. STATE: LOADING / PROSES
        btnSubmitRequest.disabled = true;
        btnSubmitText.innerHTML = `<span class="spinner"></span> Sedang memproses...`;
        if (cancelModalBtn)
            cancelModalBtn.classList.add("opacity-50", "pointer-events-none");
        if (modalFeedbackEl) {
            modalFeedbackEl.className = "p-3.5 rounded-xl text-xs font-medium bg-amber-50 text-amber-900 border border-amber-200 flex items-center gap-2";
            modalFeedbackEl.innerHTML = `<span class="spinner spinner-dark !w-3 !h-3"></span> Mengirim data request ke server REST API...`;
            modalFeedbackEl.classList.remove("hidden");
        }
        const toastLoading = showToast("loading", "Mengirim Request", "Sedang menyimpan data perjalanan baru...", 0);
        try {
            const response = await fetch("/api/requests", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    destination: destinationInput.value.trim(),
                    dateRange: dateRangeInput.value.trim(),
                    guests: parseInt(guestsInput.value, 10) || 2,
                    notes: notesInput?.value.trim() || "",
                }),
            });
            let resJson;
            try {
                resJson = await response.json();
            }
            catch {
                throw new Error("Respon server bukan format JSON.");
            }
            // Close loading toast
            if (toastLoading && toastLoading.parentElement) {
                toastLoading.remove();
            }
            // 2. STATE: ERROR DARI SERVER
            if (!response.ok || !resJson.success) {
                throw new Error(resJson.message || `Gagal membuat request (Status: ${response.status})`);
            }
            // 3. STATE: BERHASIL (SUCCESS)
            if (modalFeedbackEl) {
                modalFeedbackEl.className = "p-3.5 rounded-xl text-xs font-medium bg-emerald-50 text-emerald-900 border border-emerald-200 flex items-center gap-2";
                modalFeedbackEl.innerHTML = `
          <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
          </svg>
          <span>${escapeHtml(resJson.message || "Request baru berhasil diajukan!")}</span>
        `;
            }
            showToast("success", "Request Berhasil", `Permintaan untuk "${destinationInput.value}" telah diterima concierge.`);
            newRequestForm.reset();
            // Refresh dashboard list after short delay
            setTimeout(async () => {
                newRequestModalEl?.classList.add("hidden");
                await loadDashboardWithFeedback(true);
            }, 700);
        }
        catch (err) {
            if (toastLoading && toastLoading.parentElement) {
                toastLoading.remove();
            }
            const errorMsg = err instanceof Error ? err.message : "Terjadi kesalahan saat memproses request.";
            if (modalFeedbackEl) {
                modalFeedbackEl.className = "p-3.5 rounded-xl text-xs font-medium bg-rose-50 text-rose-900 border border-rose-200 flex items-center gap-2";
                modalFeedbackEl.innerHTML = `
          <svg class="w-4 h-4 text-rose-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
          </svg>
          <span>${escapeHtml(errorMsg)}</span>
        `;
            }
            showToast("error", "Gagal Mengajukan Request", errorMsg);
        }
        finally {
            btnSubmitRequest.disabled = false;
            btnSubmitText.textContent = "Kirim Request";
            if (cancelModalBtn)
                cancelModalBtn.classList.remove("opacity-50", "pointer-events-none");
        }
    });
    // Logout handler
    logoutBtn?.addEventListener("click", () => {
        sessionStorage.removeItem(TOKEN_KEY);
        showToast("info", "Keluar", "Anda telah keluar dari akun.");
        setTimeout(() => {
            window.location.href = "login.html";
        }, 400);
    });
}
// Initialization on DOMContentLoaded
document.addEventListener("DOMContentLoaded", () => {
    loadDashboardWithFeedback();
    setupInteractions();
});
