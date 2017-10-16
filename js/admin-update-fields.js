
title();
advantages();
scheme();
clients();
feedback();

function title() {
    var title = document.getElementsByName('Fields[title]')[0];
    title.setAttribute('value', model.title);
}

function advantages() {
    var advantagesVal = model.advantages;
    var keys = Object.keys(advantagesVal[0]);
    for(var i=1; i<keys.length; i++) {
        addField({
            'name' : 'advantages',
            'num' : 10,
            'message' : '...',
            'isText' : true,
            'isNoClick' : true
        });


    }
    var advantagesFields = document.getElementsByClassName('advantagesText');
    var advantagesFileInput = document.getElementsByClassName('advantagesImg');


    for(var i=0; i<advantagesFields.length; i++) {
        advantagesFields[i].setAttribute('value', advantagesVal[0][i]);
        var img = document.createElement('img');
        img.setAttribute('src', '/upload/images/' + advantagesVal[1][i]);
        img.className = 'advantagesImgFile';
        var div = document.getElementsByClassName('advantages')[0];

        div.insertBefore(img, advantagesFields[i].nextElementSibling);

        advantagesFileInput[i].style = "display:none;";
        advantagesFileInput[i].classList.add("inputImg-" + i);

        var close = document.createElement('span');
        close.classList.add('advantagesFileClose', 'advantagesFileClose-' + i);
        close.innerText = "[Удалить изображение]";
        div.insertBefore(close, advantagesFields[i].nextElementSibling.nextElementSibling);

        var removeBlock =  document.createElement('span');
        removeBlock.classList.add('advantagesBlockClose', 'advantagesBlockClose-' + i);
        removeBlock.innerText = "Удалить блок [x]";
        console.log(removeBlock.innerText.length);
        div.insertBefore(removeBlock, advantagesFields[i]);
    }

    // При клике на "Удалить изображение" удаляем надпись и изображение,
    // и делаем видимым поле выбора файла в преимуществах
    document.addEventListener('click', function(e){
       if(e.target.classList.contains("advantagesFileClose")) {
           for (var i = 0; i < e.target.classList.length; i++) {
               var chars = e.target.classList[i];
               if(chars[20]) {
                   e.target.previousElementSibling.remove();
                   e.target.remove();
                   var inputImg = document.getElementsByClassName('inputImg-' + chars[20])[0];
                   inputImg.style = "display: block";
               }
           }
       }
    });

    // При клике на "Удалить блок" удаляем надпись и изображение,
    // и делаем видимым поле выбора файла в преимуществах
    document.addEventListener('click', function(e){
        if(e.target.classList.contains("advantagesBlockClose")) {
            /*for (var i = 0; i < e.target.classList.length; i++) {
                var chars = e.target.classList[i];
                for(var j=0; j<chars.length; j++) {
                    if(chars[j] == "-") {
                        console.log(chars.length);
                        console.log(chars.length-1);
                        console.log(j);
                        var index = "";
                        for(var k=0; k<=chars.length-1; k++) {
                            if(k>j) {
                                index += k;
                            }
                                console.log(index);
                        }
                    }
                }




            }*/
            e.target.style = "display:none";
            for(var i=0; i<5; i++) {

            }

            e.target.nextElementSibling.style = "display:none";
            e.target.nextElementSibling.nextElementSibling.style = "display:none";
            e.target.nextElementSibling.nextElementSibling.nextElementSibling.style = "display:none";

        }
    });
}

function scheme() {
    var schemeVal = model.scheme;
    var keys = Object.keys(schemeVal[0]);
    for(var i=1; i<keys.length; i++) {
        addField({
            'name' : 'scheme',
            'num' : 10,
            'message' : '...',
            'isText' : true,
            'isNoClick' : true
        });
    }
    var schemeFields = document.getElementsByClassName('schemeText');
    var schemeFileInput = document.getElementsByClassName('schemeImg');

    for(var i=0; i<schemeFields.length; i++) {
        schemeFields[i].setAttribute('value', schemeVal[0][i]);



        var img = document.createElement('img');
        img.setAttribute('src', '/upload/images/' + schemeVal[1][i]);
        img.className = 'schemeImgFile';
        var div = document.getElementsByClassName('scheme')[0];
        div.insertBefore(img, schemeFields[i].nextElementSibling);

        schemeFileInput[i].style = "display:none;";
        schemeFileInput[i].classList.add("schemeInputImg-" + i);

        var close = document.createElement('span');
        close.classList.add('schemeFileClose', 'schemeFileClose-' + i);
        close.innerText = "[Удалить изображение]";
        div.insertBefore(close, schemeFields[i].nextElementSibling.nextElementSibling);
    }

    // При клике на "Удалить изображение" удаляем надпись и изображение,
    // и делаем видимым поле выбора файла в этапах работ
    document.addEventListener('click', function(e){
        if(e.target.classList.contains("schemeFileClose")) {
            for (var i = 0; i < e.target.classList.length; i++) {
                var chars = e.target.classList[i];
                if(chars[16]) {
                    e.target.previousElementSibling.remove();
                    e.target.remove();
                    var inputImg = document.getElementsByClassName('schemeInputImg-' + chars[16])[0];
                    inputImg.style = "display: block";
                }
            }
        }
    });
}

function clients() {
    var clientsVal = model.clients;

    var keys = Object.keys(clientsVal);
    console.log(clientsVal);
    for(var i=1; i<keys.length; i++) {
        addField({
            'name' : 'clients',
            'num' : 10,
            'message' : 'Вы добавили уже 10 полей, вы действительно хотите добавить еще поле?',
            'isText' : false,
            'isNoClick' : true
        });
    }
    var clientsFields = document.getElementsByClassName('clientsImg');


    for(var i=0; i<clientsFields.length; i++) {
        var img = document.createElement('img');
        img.setAttribute('src', '/upload/images/' + clientsVal[i]);
        img.className = 'clientsImgFile';
        var div = document.getElementsByClassName('clients')[0];
        div.insertBefore(img, clientsFields[i].nextElementSibling);

        clientsFields[i].style = "display:none;";
        clientsFields[i].classList.add("clientsInputImg-" + i);

        var close = document.createElement('span');
        close.classList.add('clientsFileClose', 'clientsFileClose-' + i);
        close.innerText = "[Удалить изображение]";
        div.insertBefore(close, clientsFields[i].nextElementSibling.nextElementSibling);
    }

    // При клике на "Удалить изображение" удаляем надпись и изображение,
    // и делаем видимым поле выбора файла в списке клиентов
    document.addEventListener('click', function(e){
        if(e.target.classList.contains("clientsFileClose")) {
            for (var i = 0; i < e.target.classList.length; i++) {
                var chars = e.target.classList[i];
                if(chars[17]) {
                    e.target.previousElementSibling.remove();
                    e.target.remove();
                    var inputImg = document.getElementsByClassName('clientsInputImg-' + chars[17])[0];
                    inputImg.style = "display: block";
                }
            }
        }
    });
}

function feedback() {
    var feedbackVal = model.feedback;
    var keys = Object.keys(feedbackVal[0]);
    for(var i=1; i<keys.length; i++) {
        addFeedback({
            'name' : 'feedback',
            'num' : 2,
            'message' : '...',
            'isNoClick' : true
        });

    }
    var feedbackFields = document.getElementsByClassName('feedbackDescriptionText');
    var feedbackFile1 = document.getElementsByClassName('feedbackResultImg');

    var feedbackText = document.getElementsByClassName('feedbackText');
    var feedbackFile2 = document.getElementsByClassName('feedbackScreenImg');


    for(var i=0; i<feedbackFields.length; i++) {
        feedbackFields[i].setAttribute('value', feedbackVal[0][i]);

        var img = document.createElement('img');
        img.setAttribute('src', '/upload/images/' + feedbackVal[1][i]);
        img.className = 'clientsImgFile';
        var div = document.getElementsByClassName('feedback')[0];
        div.insertBefore(img, feedbackFields[i].nextElementSibling.nextElementSibling);

        feedbackFile1[i].style = "display:none;";
        feedbackFile1[i].classList.add("feedbackResultImg-" + i);

        var close = document.createElement('span');
        close.classList.add('feedbackResultImgFileClose', 'feedbackResultImgFileClose-' + i);
        close.innerText = "[Удалить изображение]";
        div.insertBefore(close, feedbackFields[i].nextElementSibling.nextElementSibling.nextElementSibling);

        feedbackText[i].setAttribute('value', feedbackVal[2][i]);

        var img = document.createElement('img');
        img.setAttribute('src', '/upload/images/' + feedbackVal[3][i]);
        img.className = 'clientsImgFile';
        var div = document.getElementsByClassName('feedback')[0];
        div.insertBefore(img, feedbackText[i].nextElementSibling.nextElementSibling);

        feedbackFile2[i].style = "display:none;";
        feedbackFile2[i].classList.add("feedbackScreenImg-" + i);

        var close = document.createElement('span');
        close.classList.add('feedbackScreenImgFileClose', 'feedbackScreenImgFileClose-' + i);
        close.innerText = "[Удалить изображение]";
        div.insertBefore(close, feedbackText[i].nextElementSibling.nextElementSibling.nextElementSibling);
    }

    // При клике на "Удалить изображение" удаляем надпись и изображение,
    // и делаем видимым поле выбора файла в фото результата
    document.addEventListener('click', function(e){
        if(e.target.classList.contains("feedbackResultImgFileClose")) {
            for (var i = 0; i < e.target.classList.length; i++) {
                var chars = e.target.classList[i];
                if(chars[27]) {
                    console.log(chars[27]);
                    e.target.previousElementSibling.remove();
                    e.target.remove();
                    var inputImg = document.getElementsByClassName('feedbackResultImg-' + chars[27])[0];
                    inputImg.style = "display: block";
                }
            }
        }
    });

    // При клике на "Удалить изображение" удаляем надпись и изображение,
    // и делаем видимым поле выбора файла в фото результата
    document.addEventListener('click', function(e){
        if(e.target.classList.contains("feedbackScreenImgFileClose")) {
            for (var i = 0; i < e.target.classList.length; i++) {
                var chars = e.target.classList[i];
                if(chars[27]) {
                    console.log(chars[27]);
                    e.target.previousElementSibling.remove();
                    e.target.remove();
                    var inputImg = document.getElementsByClassName('feedbackScreenImg-' + chars[27])[0];
                    inputImg.style = "display: block";
                }
            }
        }
    });
}