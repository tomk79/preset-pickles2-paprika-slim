# Project "preset - pickles2-paprika-slim"

Pickles 2 × Paprika × Slim で、軽量なウェブアプリケーションを開発するための雛形です。

現在開発中です。


## Migration

On preview:

```
$ php src_px2/.px_execute.php -u "Mozilla" /paprika-files/bin/migrate.php
```

On production:

```
$ php dist/paprika-files/bin/migrate.php
```

## Scheduled batch

On preview:

```
* * * * * apache cd /path/to/project && php src_px2/.px_execute.php /paprika-files/bin/schedule.php >> /dev/null 2>&1
```

On production:

```
* * * * * apache cd /path/to/project && php dist/paprika-files/bin/schedule.php >> /dev/null 2>&1
```

## 更新履歴 - Change log

### tomk79/preset-pickles2-paprika-slim v0.0.1 (リリース日未定)

- Initial Relese.


## ライセンス - License

Copyright (c)2001-2019 Tomoya Koyanagi, and Pickles 2 Project<br />
MIT License https://opensource.org/licenses/mit-license.php


## 作者 - Author

- Tomoya Koyanagi <tomk79@gmail.com>
- website: <https://www.pxt.jp/>
- Twitter: @tomk79 <https://twitter.com/tomk79/>
