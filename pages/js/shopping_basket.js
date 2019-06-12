//механика корзины на сотроне клиента

shopping_basket = {};

//чтение имеющихся в корзине из БД

//создание БД 
//в БД
//добавление и удаление из корзины на клиенте


//очистка карзины
function changing_user_basket(id, sign) {

    //if(sign !== "-" || /* если в обекте корзины есть эта позиция */) {
        var URL = "index.php";
            
        var get_request = URL + "?changing_user_basket=changing&id=" + escape(id) + "&sign=" + escape(sign);
        
        var xhr = getXmlHttp();
        xhr.open("GET", get_request, true);
        
        xhr.send(null);
        console.log("determination().Открыт ассинхронный XMLHttpRequest запрос. ");		
            
        var timerId = setTimeout(function check_execution() {
            if (xhr.readyState == 4) {	console.log("determination().Состояние XMLHttpRequest запроса - 4. ");				
                if(xhr.status == 200) {	console.log("determination().Получен статус соединения 200. ");
                    xhr.abort();
                    xhr = 0;
                    console.log("determination().XMLHttpRequest запрос закрыт следующая команда - return. ");
                    return;					
                }
            }
            timerId = setTimeout(check_execution, 10);
        }, 10);
    //}
}



function getXmlHttp() {
    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } 	catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
  }
  console.log("Создан объект XMLHttpRequest.");
    return xmlhttp;
}