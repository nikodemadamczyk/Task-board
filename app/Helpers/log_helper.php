<?php
// app/Helpers/log_helper.php

if (!function_exists('custom_log')) {
    function custom_log($level, $message, $data = []) {
        $log_file = WRITEPATH . 'debuglog.txt';

        $timestamp = date('Y-m-d H:i:s');
        $log_message = "[{$timestamp}] [{$level}] {$message}";

        if (!empty($data)) {
            $log_message .= "\nData: " . print_r($data, true);
        }

        $log_message .= "\n" . str_repeat('-', 80) . "\n";

        file_put_contents($log_file, $log_message, FILE_APPEND);
    }
}

if (!function_exists('view_logs')) {
    function view_logs($lines = 100) {
        $log_file = WRITEPATH . 'debuglog.txt';

        if (!file_exists($log_file)) {
            return "No logs found.";
        }

        $logs = file($log_file);
        $logs = array_reverse($logs);
        return implode('', array_slice($logs, 0, $lines));
    }
}