# Tellad

広告

## 起動

### Composerのインストール、Dockerの起動

`$ make setup`

#### 注意点

ComposerをインストールするのでPHPの環境のセットアップが必要です。

MacOSの場合は `brew install phpenv` を実行

Linuxなどの場合は以下を参照

- https://qiita.com/ryo-endo/items/0e689e02cb87e09f4c7a


### Storageディレクトリ配下のPermissionError時

`$ make temp`

### 環境の立ち上げ、終了

- 起動: `$ make start`
- 終了: `$ make stop`

## Tips
### フロントエンド
完全にディレクトリを分けたのは、フロントのサーバーを独立する可能性を考慮

```
# /resources/nuxt 配下に設置  
$ cd /resources/nuxt
```

```
# nuxt 起動
$ yarn dev
```

```
# テスト
$ yarn test
```

```
# コード整形
$ yarn lint {--fix}
```