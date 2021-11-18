<?php

use App\libs\Logger;

require_once __DIR__ . "/../vendor/autoload.php";


/** パス情報：リソース */
const DIR_ROOT_RESOURCES = __DIR__ . '/../resources';

/** ファイル名：TSVファイル */
const FILENAME_TSV = 'sample.tsv';

/** 処理結果コード：OK */
const RETURN_OK = 0;

/** 処理結果コード：NG */
const RETURN_NG = 99;

// Logger
$log = new Logger();

// ----------
// メイン処理
// ----------
$log->info("処理開始");

try {
    // 実行
    $result = run($log, realpath(DIR_ROOT_RESOURCES).'/'.FILENAME_TSV);
} catch (\Throwable $e) {
    $log->info("エラーが発生しました, msg[{$e->getMessage()}]");
    $log->info("処理終了：異常終了");
    exit(RETURN_NG);
}

$log->info("処理終了, result[{$result}]");
exit($result);


/**
 * 処理実行
 *
 * @param Logger $log Logger
 * @param string $filename 読み込むファイル名(フルパス指定)
 * @return integer 処理結果コード
 */
function run(
    Logger $log,
    string $filename
): int {
    // --------------------
    // ファイル存在チェック
    // --------------------
    if (!file_exists($filename)) {
        $log->info("  - ファイルが存在しません!, filename[{$filename}]");
        return RETURN_NG;
    }

    // --------------------
    // ファイル読み込み
    // --------------------
    $fp = new SplFileObject($filename);
    $fp->setFlags(
        SplFileObject::READ_CSV |
        SplFileObject::SKIP_EMPTY |
        SplFileObject::READ_AHEAD
    );
    $fp->setCsvControl("\t");

    foreach ($fp as $idx => $line) {
        foreach ($line as $key => $col) {
            $log->info("行[{$idx}], 列[{$key}], 値[$col]");
        }
        $log->info("--------------------");
    }

    return RETURN_OK;
}
