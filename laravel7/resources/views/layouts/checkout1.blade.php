<div class="container checkout1">
  <div class="main-shopping">

    <!-- title -->
    <div class="row">
      <div class="col-12 text-left">
        <h2>
          購物車
        </h2>
      </div>
    </div>

    <!-- 進度條 -->
    <div class="row">
      <div class="col-12 d-flex justify-content-around">
        <div class="progess-point">
          <p>
            1
          </p>
          確認購物車
        </div>
        <div class="progess-bar"></div>
        <div class="progess-point-yet">
          <p>
            2
          </p>
          付款與運送方式
        </div>
        <div class="progess-bar-empty"></div>
        <div class="progess-point-yet">
          <p>
            3
          </p>
          填寫資料
        </div>
        <div class="progess-bar-empty"></div>
        <div class="progess-point-yet">
          <p>
            4
          </p>
          完成訂購
        </div>
      </div>
    </div>
    <hr>

    <!-- 訂單明細 -->
    <div class="row">
      <div class="col-12 text-left">
        <h3>
          訂單明細
        </h3>
      </div>
    </div>

    <!-- vue for -->
    <div id="app">
      <div v-for="item in arr">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-1">
                <img src="https://picsum.photos/200/200" alt="">
              </div>
              <div class="col-1">
                <p>
                  ${ item.title }$
                </p>
                #${ item.hashId }$
              </div>
              <div class="col-1 offset-7 d-flex">
                <button class="product-quantity" onclick="calcPlusMinusFunction(this, 'minus');"
                  :name="item.hashId">減</button>
                <input class="product-quantity" type="number" :name="item.hashId" id="">
                <button class="product-quantity" onclick="calcPlusMinusFunction(this);" :name="item.hashId">加</button>
              </div>
              <div class="col-1 offset-1 product-one-sum" :name="item.hashId">
                總價
              </div>
            </div>
          </div>
        </div>
        <hr>
      </div>
    </div>

    <!-- 計算欄位 -->
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-2 offset-8">
            數量 :
          </div>
          <div class="col-2">
            這裡要填入對應數量
          </div>
        </div>
        <div class="row">
          <div class="col-2 offset-8">
            小計 :
          </div>
          <div class="col-2">
            這裡要填入對應小計
          </div>
        </div>
        <div class="row">
          <div class="col-2 offset-8">
            運費 :
          </div>
          <div class="col-2">
            這裡要填入對應運費
          </div>
        </div>
        <div class="row">
          <div class="col-2 offset-8">
            總計 :
          </div>
          <div class="col-2">
            這裡要填入對應總計
          </div>
        </div>
      </div>
    </div>
    <hr>

    <!-- btn-block -->
    <div class="row">
      <div class="col-2">
        <a href="./main.html">返回購物</a>
      </div>
      <div class="offset-8 col-2">
        <a href="/checkout2">
          <button class="btn-next">
            下一步
          </button>
        </a>
      </div>
    </div>

  </div>
</div>
