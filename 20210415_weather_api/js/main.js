
fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-24A1604D-58DB-4133-A411-7CBE956E3B4B')
    .then(function (response) {
        return response.text();
    })
    .then(function (result) {
        let resultJson = JSON.parse(result).records.location;

        resultJson.forEach(element => {            
            if (element.weatherElement[0].time[0].parameter.parameterName.indexOf('晴') != -1) {
                element.weatherElement[5] = 'weather-sun';
                if (element.weatherElement[0].time[0].parameter.parameterName.indexOf('雲') != -1) {
                    element.weatherElement[5] = 'weather-sun-cloud';
                    if (element.weatherElement[0].time[0].parameter.parameterName.indexOf('雨') != -1) {
                        element.weatherElement[5] = 'weather-sun-cloud-rain';
                    }
                }
            }else{
                element.weatherElement[5] = 'weather-cloud-dark';
                if (element.weatherElement[0].time[0].parameter.parameterName.indexOf('雨') != -1) {
                    element.weatherElement[5] = 'weather-cloud-rain';
                }
            }
        });

        const vm = Vue.createApp({
            data() {
                return {
                    resultJson
                }
            }
        }).mount('#app');
    });


















