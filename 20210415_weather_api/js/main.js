

fetch('https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-24A1604D-58DB-4133-A411-7CBE956E3B4B')
    .then(function (response) {
        return response.text();
    })
    .then(function (result) {
        let resultJson = JSON.parse(result);
        console.log(resultJson.records.location);
    })
















// const vm = Vue.createApp({
//     data() {
//         return {

//             isShow:true

//             // arr: [
//             //     { title: '品項1', hashId: '_' + Math.floor(Math.random() * 1000000) },
//             //     { title: '品項2', hashId: '_' + Math.floor(Math.random() * 1000000) },
//             //     { title: '品項3', hashId: '_' + Math.floor(Math.random() * 1000000) },
//             //     { title: '品項4', hashId: '_' + Math.floor(Math.random() * 1000000) },
//             //     { title: '品項5', hashId: '_' + Math.floor(Math.random() * 1000000) }
//             // ]

//         }
//     }
// }).mount('#app');

