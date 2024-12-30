<?php

namespace App\Services;

use Carbon\Carbon;

class OrderStatusService
{
    // Status Constants
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SHIPPED = 'shipped';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';

    // Payment Status Constants
    const PAYMENT_UNPAID = 'unpaid';
    const PAYMENT_PAID = 'paid';

    public static function getStatusLabel($status): string
    {
        return match ($status) {
            self::STATUS_PENDING => 'Menunggu Pembayaran',
            self::STATUS_PROCESSING => 'Dikemas',
            self::STATUS_SHIPPED => 'Dikirim',
            self::STATUS_COMPLETED => 'Selesai',
            self::STATUS_CANCELLED => 'Dibatalkan',
            default => 'Status Tidak Diketahui'
        };
    }

    public static function getStatusColor($status): string
    {
        return match ($status) {
            self::STATUS_PENDING => 'text-orange-500',
            self::STATUS_PROCESSING => 'text-blue-500',
            self::STATUS_SHIPPED => 'text-blue-500',
            self::STATUS_COMPLETED => 'text-green-500',
            self::STATUS_CANCELLED => 'text-red-500',
            default => 'text-gray-500'
        };
    }

    public static function getStatusInfo($status, $paymentDeadline = null, $completedAt = null): array
    {
        return match ($status) {
            self::STATUS_PENDING => [
                'icon' => 'bi-clock-fill',
                'color' => 'orange',
                'title' => 'Menunggu Pembayaran',
                'message' => $paymentDeadline ?
                    'Selesaikan pembayaran sebelum ' . $paymentDeadline->format('d M Y H:i') :
                    'Selesaikan pembayaran'
            ],
            self::STATUS_PROCESSING => [
                'icon' => 'bi-box-seam-fill',
                'color' => 'blue',
                'title' => 'Pesanan Dikemas',
                'message' => 'Penjual sedang menyiapkan pesanan Anda'
            ],
            self::STATUS_SHIPPED => [
                'icon' => 'bi-truck',
                'color' => 'green',
                'title' => 'Dalam Pengiriman',
                'message' => 'Pesanan sedang dalam perjalanan'
            ],
            self::STATUS_COMPLETED => [
                'icon' => 'bi-check-circle-fill',
                'color' => 'green',
                'title' => 'Pesanan Selesai',
                'message' => $completedAt ?
                    'Pesanan telah diterima pada ' . Carbon::parse($completedAt)->format('d M Y H:i') :
                    'Pesanan telah selesai'
            ],
            self::STATUS_CANCELLED => [
                'icon' => 'bi-x-circle-fill',
                'color' => 'red',
                'title' => 'Pesanan Dibatalkan',
                'message' => 'Pesanan telah dibatalkan'
            ],
            default => [
                'icon' => 'bi-info-circle-fill',
                'color' => 'gray',
                'title' => 'Status Tidak Diketahui',
                'message' => ''
            ]
        };
    }

    public static function getPaymentStatusLabel($status): string
    {
        return match ($status) {
            self::PAYMENT_UNPAID => 'Belum Dibayar',
            self::PAYMENT_PAID => 'Sudah Dibayar',
            default => 'Status Pembayaran Tidak Diketahui'
        };
    }

    public static function getPaymentStatusColor($status): string
    {
        return match ($status) {
            self::PAYMENT_UNPAID => 'text-red-500',
            self::PAYMENT_PAID => 'text-green-500',
            default => 'text-gray-500'
        };
    }
}
