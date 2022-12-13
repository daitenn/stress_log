# 概要
このwebアプリケーションは各個人のストレスレベルを可視化するために作成した。

https://twitter.com/xu04k/status/1521779725701873665?s=61&t=_4J3wNDuCcb7Xgcj-fqrOw

# 構成及びセキュリティ
二層構造で実装しており、フロントエンド側はBootstrapを用いて、レイアウトをしている。
バックエンド側はPHP,SQLを用いて、実装している。
セキュリティとしてXSS対策をしている。

# 主な静的解析ツール
・PHP_CodeSniffer
・PHPMD
・PHPStan
