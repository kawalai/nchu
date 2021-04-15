
fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-24A1604D-58DB-4133-A411-7CBE956E3B4B')
    .then(function (response) {
        return response.text();
    })
    .then(function (result) {
        let resultJson = JSON.parse(result).records.location;

        const vm = Vue.createApp({
            data() {
                return {
                    resultJson,
                    wx: '天氣',
                    maxt: '最高溫度',
                    mint: '最低溫度',
                    ci: '舒適度',
                    pop: '降雨機率'
                }
            }
        }).mount('#app');
    });


















