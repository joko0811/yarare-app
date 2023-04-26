# ネタばらし

　リダイレクト以外の問題を出題したかったため、ディレクトリトラバーサルによる不正なファイル操作の問題を作成しました。少し危機管理の問題としては不適なため他の方が作ってくださった問題と組み合わせて練習を実施してください。

　サイトから閲覧できるアプリケーションのログ（view_message.php）を見てパッとディレクトリトラバーサルという単語が出てくるかが鍵になります。write_message.phpにはあらかじめ不正なユーザー名をチェックする記述が存在するため、これを参考にして入力文字に"../"を含まないかバリデーションできると良いでしょう。