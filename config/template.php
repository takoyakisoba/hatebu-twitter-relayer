<?php

// 置換文字列一覧
//   ###username### : ブックマークしたユーザーのid
//   ###title###    : イベント対象のエントリのタイトル
//   ###url###      : イベント対象のエントリのURL
//   ###comment###  : イベント対象のブックマークに付与されたコメント
//   and more.
//   See App\HatenaBookmark\EventEntity

$template = <<<'__EOM__'
###comment### > ###title### ###url###
__EOM__;

return $template;
