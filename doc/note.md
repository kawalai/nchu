- css 渲染有優先度的坑
    * id > class > tag
    * line-height 可以調整文字高度(設定成該欄高度後)
    * nth-child(x) 偽元素 https://www.w3schools.com/css/css_pseudo_classes.asp
    * css hover 更改其他欄位參考網址 https://www.devsong.org/article/73.html

- 20210319
    
    @media 英文單字 : 指定裝置(ex: screen...)
        ex @media print : 指定列印的版面
        !!! 改變頁面尺寸時 會繼承上一個尺寸的設定 會導致多了這個size沒設定的值
    
    css檔用引入的方式帶入html
        <link rel="stylesheet" href="路徑">
        對應版面建立css檔案

    選擇器
        css diner 練習網站

    display
        block
            佔滿父層寬度
            可設定寬高
        inline
            依據內容撐開大小
            不可設定寬高
        inline-block
            可設定寬高
            不會佔滿父層
    flex
        flex froggy 練習網站
        主軸 align-items
        切軸 justify-content


    material icon

- 20210322
    fluent design
        671以下是一版(min)
        768以下是一版

    html 語意標籤

    colorzilla 顏色插件

    margin bottom 邊界重疊的原因

    ms官網仿切
    https://www.microsoft.com/zh-tw

    rwd-flex 解題
        margin auto 對有寬高的才有用

        display: table;
        text-align: center;
        以上兩個一起用能讓文字置中

- 20210323
    swipe : slide效果

- 20210325
    css content code list https://www.w3schools.com/cssref/css_entities.asp

- 20210329
    企劃規劃 site map
    design thinking

    footer 組成元素
        1. 版權聲明
        2. 聯絡資訊
        3. 網站架構
        4. 隱私權政策
        5. 退貨(款)條款 (電傷網站專屬)
        6. 社群連結
        7. 無障礙標章
        8. 投資人專區 (台灣公司法規定 上市櫃公司必備)

- 20210331
    ::before
    ::after
        一定要有content才有作用

    fontawesome icon

    js html dom style 參考頁面 https://www.w3schools.com/jsref/dom_obj_style.asp


- 20210407
    js 函式內使用到函式內未定義、未傳值的變數時，會往父層找
        此狀況發生時會改變父層的值

- 20210408
    google 整理的套件
    https://developers.google.com/speed/libraries

    popper

    collapse 摺疊

    css 權重
    https://miro.medium.com/max/1626/1*X_MeJXCDPjcV_8HPI-aaHQ.png

    接下來四天的切版作業
    https://lesson-bootstrap.dev-hub.io/

- 20210412
    在div 增加tabindex="1" 後，才可以focus到此div

- 20210419    
    https://www.qbittorrent.org/download.php
    開啟搜尋功能>更新

    https://gfxdomain.co/
    學習用網站

    ps 快速鍵
        取消選取 ctrl + D

    ripples 水波特效

    p5js js特效

- 20210420
    sass css預處理器
    套件
        Live Sass Compiler
        Beautify css/sass/scss/less

    scss
        變數
            $自定義變數名稱: 值;
        mixin、include
            函數般的存在，參數預設值用:
        %自定義元件名稱、@extend %自定義元件名稱
            設定好的style元件
            %(placeholder)，沒@extend的話就不會在css 裡面出現
        _自定義名稱.scss
            可將變數、函數、元件全部放置於此
            在最前面有_的話就不會被自動編譯
        #{變數名稱}
            差值
        @for $變數名稱 from start to end (小於end)
        @for $變數名稱 from start through end (小於等於end)

- 20210427
    手動安裝vscode的相關步驟
        下載需要的vsix檔案後，使用cmd在 C:\Users\user\Downloads 輸入下列指令
        code --install-extension ritwickdey.live-sass-3.0.0.vsix
        code --install-extension ritwickdey.LiveServer-5.6.1.vsix

    未來趨勢
        WebAssembly
            web 使用的第四種語言(html、css、js)

    設計大師的頻道
        FZDSCHOOL

- 20210504
    1. laravel init 步驟
        1. composer install
            生成vendor
        2. npm install
            生成node_modules
        3. php artisan key:gen(generate)
            生成APP_KEY
        4. 複製.env.example
        5. 改名.env.example copy => .env
        6. php artisan serve
    2. data struction
        1. 路由 : routes/web.php
        2. view : resources/views/xxx.blade.php
    3. php function
        1. compact()
            將"變數 = 值,...,..." 變成array[變數 => 值,...,...]

    https://www.taiwan.net.tw/m1.aspx?sNo=0001001 回家切版作業

- 20210505
    1. 建立controller
        1. php artisan make:controller NameController
        2. controller 命名規則
            1. 大駝峰
            2. 單數
        3. 會建立在app > Http > Controllers
        4. https://hackmd.io/@VsQ_Erf8QDS3ndjx9qWsYQ/ByDMsuhM-/https%3A%2F%2Fhackmd.io%2FCwYwhgzAbApgHFAtHAnAIzY4awBNkwCsA7ImFCBCHAIxwBMhhIQA%3Fboth?type=book

- 20210506
    1. php artisan migrate 相關指令
        1. php artisan migrate : 依照database > migrations 裡面的資料在設定好的資料庫建立table
        2. php artisan make:migration create_口口口s_table : 建立資料表
        3. 新增欄位
            1. php artisan make:migration add_口口口_to_口口口_table
            2. 在新生出來的php檔案的up function 裡面
        4. php artisan make:migration remove_口口口_from_口口口_table : 刪除欄位
        5. php artisan make:migration update_口口口_to_口口口_table : 更新欄位
    2. https://hackmd.io/5zEROHjsRW2SGnnjuXQxyg?view
        1. laravel 筆記
    3. php artisan make:model 大駝峰model 相關指令
        1. php artisan make:controller **Name**Controller --resource --model=**Name**
            * 使用上述指令可值接生成controller跟model相關檔案
    4. 回家製作編輯、新增、刪除功能的一點筆記
        1. 刪除功能使用jq 的ajax call 後端的php檔案，在PHP做資料刪除的動作，以下是難點紀錄
            1. 使用POST call 後端時遇到csrf問題
                - 後來是在ajax 中加入headers 且在底版頁面加入<meta name="csrf-token" content="{{ csrf_token() }}">

- 20210507
    1. 老師的筆記 https://hackmd.io/cf3-PB13Rvm6MWCl5pJsPA
    2. model : where return 的東西是array
    3. 製作後台的回家作業
        1. https://datatables.net/ 後台表格用的插件
        2. https://startbootstrap.com/theme/sb-admin-2 希望能套用的樣式插件

- 20210510 
    1. https://hackmd.io/o_O0BuOcR_-rxbcjQIqOHA?view#%E6%AA%94%E6%A1%88%E4%B8%8A%E5%82%B3

- 20210511
    1. 尋找可用的主題
        * 臺中市公私協力及私立托嬰中心
            - https://opendata.taichung.gov.tw/dataset/1b38f3b2-1b54-11e8-8f43-00155d021202
        * 臺中市公私協力托育資源中心
            - https://opendata.taichung.gov.tw/dataset/3abb88d9-1a9f-11e8-8f43-00155d021202
        * 台北市資料大平台
            - https://data.taipei/#/dataset?keyword=&type=dataset

- 20210512
    1. 回去練習
        * https://forms.gle/X7MvY7q2zBfEJ3Rt7


