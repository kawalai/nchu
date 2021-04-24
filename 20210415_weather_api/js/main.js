
function wxProcess(element, timeIndex) {
    if (element.weatherElement[0].time[timeIndex].parameter.parameterName.indexOf('晴') != -1) {
        element.weatherElement[0].time[timeIndex][5] = 'weather-sun';
        if (element.weatherElement[0].time[timeIndex].parameter.parameterName.indexOf('雲') != -1) {
            element.weatherElement[0].time[timeIndex][5] = 'weather-sun-cloud';
            if (element.weatherElement[0].time[timeIndex].parameter.parameterName.indexOf('雨') != -1) {
                element.weatherElement[0].time[timeIndex][5] = 'weather-sun-cloud-rain';
            }
        }
    } else {
        element.weatherElement[0].time[timeIndex][5] = 'weather-cloud-dark';
        if (element.weatherElement[0].time[timeIndex].parameter.parameterName.indexOf('雨') != -1) {
            element.weatherElement[0].time[timeIndex][5] = 'weather-cloud-rain';
        }
    }
}

fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-24A1604D-58DB-4133-A411-7CBE956E3B4B')
    .then(function (response) {
        return response.text();
    })
    .then(function (result) {
        let resultJson = JSON.parse(result).records.location;

        resultJson.forEach(element => {
            wxProcess(element, 0);
            wxProcess(element, 1);
            wxProcess(element, 2);
        });

        const vm = Vue.createApp({
            data() {
                return {
                    resultJson,
                    flagTime0: true,
                    flagTime1: false,
                    flagTime2: false
                }
            },
            methods: {
                choiceTime0: function () {
                    this.flagTime0 = true;
                    this.flagTime1 = false;
                    this.flagTime2 = false;
                },
                choiceTime1: function () {
                    this.flagTime0 = false;
                    this.flagTime1 = true;
                    this.flagTime2 = false;
                },
                choiceTime2: function () {
                    this.flagTime0 = false;
                    this.flagTime1 = false;
                    this.flagTime2 = true;
                }
            }
        }).mount('#app');
    });


















