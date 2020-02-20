module.exports = {
  root: true,
  env: {
      browser: true,
      node: true
  },
  parserOptions: {
      parser: '@typescript-eslint/parser',
      sourceType: 'module',
      // project: './tsconfig.json',
      // ecmaFeatures: { "legacyDecorators": true }
  },
  extends: [
      '@nuxtjs',
      'plugin:nuxt/recommended',
      'plugin:prettier/recommended',
      'prettier/vue',
      'prettier/@typescript-eslint'
      // '@nuxtjs',
      // 'prettier',
      // 'prettier/vue',
      // 'plugin:prettier/recommended',
      // 'plugin:nuxt/recommended'
  ],
  plugins: [
      '@typescript-eslint',
      'prettier'
  ],
  // add your custom rules here
  rules: {
      'no-unused-vars': 'off',
      '@typescript-eslint/no-unused-vars': 'error',
      '@typescript-eslint/no-explicit-any': 'warn',
      "@typescript-eslint/ban-types": ["error", {
          "types": {
              "object": null,
          }
      }],

      // for文だけでなく、++は使いたかった
      'no-plusplus': 'off',
      // 無名関数を許可
      'func-names': 'off',
      // html部分をPascalにするかkebabにするかの選択
      'vue/component-name-in-template-casing': ['error', 'PascalCase'],
      // 自己終了形式のコンポーネント
      'vue/html-self-closing': ['error', {
          'html': {
              'void': 'always',
          }
      }],
      // 不要なカッコは消す
      'no-extra-parens': 'warn',
      // 無駄なスペースの削除(prettierでやられる)
      // 'no-multi-spaces': 'off',
      // 不要な空白行は削除。2行開けてたらエラー
      'no-multiple-empty-lines': ['error', { 'max': 1 }],
      // 関数とカッコはあけない(function hoge() {/** */})
      'func-call-spacing': ['error', 'never'],
      // true/falseを無駄に使うな
      'no-unneeded-ternary': 'error',
      // セミコロンは禁止
      'semi': ['error', 'never', { 'beforeStatementContinuationChars': 'never' }],
      'semi-spacing': ['error', { 'after': true, 'before': false }],
      'semi-style': ['error', 'first'],
      'no-extra-semi': 'error',
      'no-unexpected-multiline': 'error',
      'no-unreachable': 'error',
      // 文字列はシングルクオートのみ
      'quotes': ['error', 'single'],
      // varは禁止
      'no-var': 'error',
      // jsのインデントは2
      'indent': ['error', 2, { 'SwitchCase': 1 }],
      // かっこの中はスペースなし
      'space-in-parens': ['error', 'never'],
      // コンソールは許可
      'no-console': 'off',
      // カンマの前後にスペース入れる？
      'comma-spacing': 'error',
      // 配列のindexには空白なし
      'computed-property-spacing': 'error',
      // キーワードの前後には適切なスペースを
      'keyword-spacing': 'error',
      // 演算子の前後にはスペース
      'space-infix-ops': 'error',
      // !! を許可
      'no-extra-boolean-cast': 'off',
  }
}