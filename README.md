# 概要
このwebアプリケーションは各個人のストレスレベルを可視化するために作成した。

![スクリーンショット 2022-12-13 15 41 19](https://user-images.githubusercontent.com/101037787/207245084-3c5b1ba7-5d4d-46ad-b78c-6843c0f75b8b.png)



https://twitter.com/xu04k/status/1521779725701873665?s=61&t=_4J3wNDuCcb7Xgcj-fqrOw

# 構成及びセキュリティ
二層構造で実装しており、フロントエンド側はBootstrapを用いて、レイアウトをしている。
バックエンド側はPHP,SQLを用いて、実装している。
セキュリティとしてXSS対策をしている。

# 主な静的解析ツール
・PHP_CodeSniffer
・PHPMD
・PHPStan
