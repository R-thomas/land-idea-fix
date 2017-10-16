addField({
    'name' : 'advantages',
    'num' : 5,
    'message' : 'Вы добавили уже 5 полей, вы действительно хотите добавить еще поле?',
    'isText' : true,
    'isNoClick' : false
});
addField({
    'name' : 'scheme',
    'num' : 4,
    'message' : 'Вы добавили уже 4 поля, вы действительно хотите добавить еще поле?',
    'isText' : true,
    'isNoClick' : false
});
addField({
    'name' : 'clients',
    'num' : 5,
    'message' : 'Вы добавили уже 5 полей, вы действительно хотите добавить еще поле?',
    'isText' : false,
    'isNoClick' : false
});

addFeedback({
    'name' : 'feedback',
    'num' : 1,
    'message' : 'Вы добавили уже 1 поле, вы действительно хотите добавить еще поле?'
});

function addField(options) {
    var name = options.name;
    var num = options.num;
    var message = options.message;
    var isText = options.isText;
    var isNoClick = options.isNoClick;

    var button = document.getElementsByClassName('button-' + name)[0];


    if(isNoClick) {
        add(button);
    } else {
        button.addEventListener('click', function(e){
            e.preventDefault();
            add(this);
        });
    }
    function add(context){
        if(isText) {
            var inputText = document.createElement('input');
            inputText.setAttribute('type', 'text');
            inputText.setAttribute('name', name + 'Text[]');
            inputText.classList.add('form-control', name + 'Text')
        }

        var div = document.getElementsByClassName(name)[0];


        var inputFile = document.createElement('input');
        inputFile.setAttribute('type', 'file');
        inputFile.setAttribute('name', name + 'Img[]');
        inputFile.setAttribute('class', name + 'Img');

        var hr = document.createElement('hr');

        var imgFields = document.querySelectorAll('input.' + name + 'Img');
        if(imgFields.length<num) {
            div.insertBefore(hr, context);
            if(isText)
                div.insertBefore(inputText, context);
            div.insertBefore(inputFile, context);


        } else {
            console.log(1);
            if( confirm(message) ){
                div.insertBefore(hr, context);
                if(isText)
                    div.insertBefore(inputText, context);
                div.insertBefore(inputFile, context);
            }
            else {
                return false;
            }
        }
    }
}

function addFeedback(options) {

    var name = options.name;
    var num = options.num;
    var message = options.message;
    var isNoClick = options.isNoClick;

    var button = document.getElementsByClassName('button-' + name)[0];

    if(isNoClick) {
        add(button);
    } else {
        button.addEventListener('click', function(e){
            e.preventDefault();
            add(this);
        });
    }

    function add(context) {
        var inputDescriptionText = document.createElement('input');
        inputDescriptionText.setAttribute('type', 'text');
        inputDescriptionText.setAttribute('name', name + 'DescriptionText[]');
        inputDescriptionText.setAttribute('class', name + 'DescriptionText');


        var inputText = document.createElement('input');
        inputText.setAttribute('type', 'text');
        inputText.setAttribute('name', name + 'Text[]');
        inputText.setAttribute('class', name + 'Text');


        var div = document.getElementsByClassName(name)[0];


        var inputImgResult = document.createElement('input');
        inputImgResult.setAttribute('type', 'file');
        inputImgResult.setAttribute('name', name + 'ResultImg[]');
        inputImgResult.setAttribute('class', name + 'ResultImg');

        var inpuImgScreen = document.createElement('input');
        inpuImgScreen.setAttribute('type', 'file');
        inpuImgScreen.setAttribute('name', name + 'ScreenImg[]');
        inpuImgScreen.setAttribute('class', name + 'ScreenImg');
        var hr = document.createElement('hr');

        var imgFields = document.querySelectorAll('input.' + name + 'ResultImg');
        if(imgFields.length<num) {
            div.insertBefore(hr, context);
            div.insertBefore(inputDescriptionText, context);
            div.insertBefore(inputImgResult, context);
            div.insertBefore(inputText, context);
            div.insertBefore(inpuImgScreen, context);

        } else {
            if( confirm(message) ){
                div.insertBefore(hr, context);
                div.insertBefore(inputDescriptionText, context);
                div.insertBefore(inputImgResult, context);
                div.insertBefore(inputText, context);
                div.insertBefore(inpuImgScreen, context);
            }
            else {
                return false;
            }
        }
    }
}
