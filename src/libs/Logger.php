<?php

namespace App\libs;

/**
 * Loggerクラス
 *
 * 標準出力にログ出力する
 */
class Logger
{
    /** ログレベル：INFO */
    public const LOGLEVEL_INFO = 'info';

    /**
     * ログ出力：INFOレベル
     *
     * 標準出力にログ出力します
     *
     * @param string $msg 出力対象メッセージ
     * @return void
     */
    public function info($msg): void
    {
        $this->stdout(self::LOGLEVEL_INFO, $msg);
    }

    /**
     * 標準出力する
     *
     * @param string $level ログレベル
     * @param string $msg 出力対象メッセージ
     * @return void
     */
    protected function stdout($level, $msg): void
    {
        echo "[" . date('Y-m-d H:i:s') . "][{$level}] {$msg}\n";
    }
}
