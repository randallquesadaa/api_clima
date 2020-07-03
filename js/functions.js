(function ($, Drupal) {
        Drupal.behaviors.consoleExit = {
        attach: function (context, settings) {
            window.onload=function() {
                obtenerDatosAlCargar('3624060');
            }
            function obtenerDatosAlCargar(valor){
                let url = `https://api.openweathermap.org/data/2.5/weather?id=${valor}&appid=b97d567f9e495e8e5b9b2ed57ab36b2f&units=metric`;
                const api = new XMLHttpRequest();
                api.open('GET', url, true);
                api.send();


                api.onreadystatechange = function () {
                    if (this.status == 200 && this.readyState == 4) {
                        let datos = JSON.parse(this.responseText);
                        let resultados = document.querySelector('#resultados');
                        resultados.innerHTML = '';
                        for(let item of datos.weather){
                            resultados.innerHTML += `<h3>${datos.main.temp}° C</h3>`;
                        }
                    }
                }
            }
        },
    };
})(jQuery, Drupal);