 
let labelsMain = ['காட்டு யானைகள் வருகை', 'காட்டு விலங்குகள் வருகை', 'யானைகள் வேலி சேதங்கள்', 'பயிர் சேதங்கள்', 'மற்றவை' ];
 
// let dataMain = [1,31,15,20,10];
let colorsMain= ['#49A9EA','#36CAAB','#884EA0','#A6ACAF','#0E6251'];

// let myChart1 = document.getElementById("myChart1").getContext('2d');

let mychart  = new Chart(myChartmain,{
    type : 'doughnut',
    data: {
        labels : labelsMain,
        datasets : [
            {
                data: dataMain,
                backgroundColor : colorsMain
            }
        ]
    },
    options: {
        title: {
            text:"",
            display: true 
        }
    }
});
let labels1 = ['காட்டு யானைகள் வருகை', 'காட்டு விலங்குகள் வருகை', 'யானைகள் வேலி சேதங்கள்', 'பயிர் சேதங்கள்', 'மற்றவை' ];
 
// let data1 = [69,31,15,20,10];
let colors1= ['#49A9EA','#36CAAB','#884EA0','#A6ACAF','#0E6251'];

// let myChart1 = document.getElementById("myChart1").getContext('2d');

let mychart1 = new Chart(myChart1,{
    type : 'doughnut',
    data: {
        labels : labels1,
        datasets : [
            {
                data: data1,
                backgroundColor : colors1
            }
        ]
    },
    options: {
        title: {
            text:"",
            display: true 
        }
    }
});

let labels2 = ['மத்திய மாகாணம்', 'கிழக்கு மாகாணம்', 'வடக்கு மாகாணம்', 'தென் மாகாணம்', 'மேற்கு மாகாணம்', 'வடமேல் மாகாணம்', 'வட மத்திய மாகாணம்', 'ஊவா மாகாணம்', 'சப்ரகமுவா மாகாணம்'];
 
//let data2 = [69,31,15,20,10,20,10,23,78 ];
let colors2= ['#C0392B','#C39BD3','#5499C7','#7FB3D5','#76D7C4','#F7DC6F','#EB984E','#EB984E','#ECF0F1'];

// let myChart1 = document.getElementById("myChart1").getContext('2d');

let mychart2 = new Chart(myChart2,{
    type : 'pie',
    data: {
        labels : labels2,
        datasets : [
            {
                data: data2,
                backgroundColor : colors2 
            }
        ]
    },
    options: {
        title: {
            text:"",
            display: true 
        }
    }
});
let labels3 = ['12.00 am','01.00 am','02.00 am','03.00 am','04.00 am','05.00 am','06.00 am','07.00 am','08.00 am','09.00 am','10.00 am','11.00 am','12.00 pm','01.00 pm','02.00 pm','03.00 pm','04.00 pm','05.00 pm','06.00 pm','07.00 pm','08.00 pm','09.00 pm','10.00 pm','11.00 pm',  ];
 
//let data3 = [6 , 5 , 8 , 8 , 5 , 5 , 4 ,8 ,7 ,9 ,7,9,8,6,5,1,2,3,4,7,6,5,4,3] ;
let colors3= ['#49A9EA','#36CAAB','#884EA0','#A6ACAF','#0E6251'];

 

let mychart3 = new Chart(myChart3,{
    type : 'line',
    data: {
        labels : labels3,
        datasets : [
            {
                label: 'Hourly Update',
                data: data3,
              
              fill: false,
              borderColor: 'red',
          
            }
        ]
    },
    // options: {
    //     title: {
    //         text:"",
    //         display: true 
    //     }
    // }
});
let labels4 = ['ஜனவரி', 'பிப்ரவரி', 'மார்ச்', 'ஏப்ரல்', 'மே', 'ஜூன்', 'ஜூலை', 'ஆகஸ்ட்', 'செப்டம்பர்', 'அக்டோபர்', 'நவம்பர்', 'டிசம்பர்'];    
 
// let data4 = [ 8,6,5,1,2,3,4,7,6,5,4,3] ;
let colors4= ['#49A9EA','#36CAAB','#884EA0','#A6ACAF','#0E6251','#BD9800','#6EF237','#025E4A','#D81CC7','#590251','#F44242','#C0DE39'];

// let myChart1 = document.getElementById("myChart1").getContext('2d');

let mychart4 = new Chart(myChart4,{
    type : 'bar',
    data: {
        labels : labels4,
        datasets : [
            {
               // label: 'Hourly Update',
                label: 'Monthly Update',
                data: data4,
               backgroundColor : colors4
              //fill: false,
            //   borderColor: 'red',
          
            }
        ]
    },
    options: {
        title: {
            text:"",
            display: true 
        }
    }
});


 