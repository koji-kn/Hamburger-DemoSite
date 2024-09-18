'use strict';{
    //ボタンアクション
    let button = document.getElementById('btn');

    function buttonClick(){
        alert('ボタンがクリックされました');   //alert()でアラート出力
    }

    button.onclick = buttonClick; // onclickプロパティ　上記の関数を代入

}
