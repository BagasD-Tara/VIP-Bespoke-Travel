export interface Customer {
  name: string;
  email: string;
}

export interface Business {
  name: string;
  logo: string;
}

export interface ActionItem {
  id: string;
  type: "proposal" | "review" | string;
  title: string;
  subtitle: string;
  badge: string;
  actionLabel?: string | null;
  actionUrl?: string | null;
}

export interface TravelRequest {
  id: string;
  destination: string;
  dateRange: string;
  guests: number;
  statusBadge: string;
  statusType: "warning" | "info" | "success" | string;
  currentStepIndex: number;
  steps: string[];
  footerType: "estimate" | "confirmed" | string;
  costEstimate?: string;
  costBadge?: string;
  confirmedText?: string;
}

export interface UpcomingTrip {
  dateDay: string;
  dateMonth: string;
  destination: string;
  confirmedSummary: string;
}

export interface MessageItem {
  id: string;
  sender: string;
  initial: string;
  time: string;
  message: string;
}

export interface DashboardData {
  customer: Customer;
  business: Business;
  perluTindakan: ActionItem[];
  requestSaya: TravelRequest[];
  perjalananMendatang: UpcomingTrip;
  pesanTerbaru: MessageItem[];
}

export interface ApiResponse<T> {
  success: boolean;
  data?: T;
  message?: string;
}

export type ApiStatus = "idle" | "loading" | "success" | "error";

export interface ApiState<T> {
  status: ApiStatus;
  data: T | null;
  error: string | null;
}

export type ToastType = "info" | "success" | "error" | "loading";

export interface ToastMessage {
  id: string;
  type: ToastType;
  title: string;
  message: string;
  duration?: number;
}
