import { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import {CanvasJSChart} from 'canvasjs-react-charts'

import axios from 'axios';

function Statstics (){

    const [options,setOptions] = useState({
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "dark1", "dark2"
        title:{
            text: "Nbr of Groups By Estab"
        },
        data: [{
            type: "pie",
            indexLabel: "{label}: {y} Group",
            startAngle: -90,
            dataPoints: [
               { y: 22, label:'sss'}
            ]
        }]
    })
    const [options2,setOptions2] = useState({
        theme: "light2",
			title: {
				text: "Number of Passed Quizes By Months"
			},
			axisY: {
				title: "Quuiz Passed",
				prefix: "Qz"
			},
			data: [{
				type: "line",
				xValueFormatString: "MMM YYYY",
				yValueFormatString: "$#,##0.00",
				dataPoints: [

                ]
			}]
    })
    const getstatistics = () =>{
        axios.get('/quizapi/grbByestablish')
              .then(res =>{
                res.data.groupsByEtabliss.forEach((val,index) =>{

                    options.data[0].dataPoints[index] = {
                        y:val.groups.length , label:val.name
                    }
                })
                setOptions({...options})

                res.data.QuizRes.forEach((val,index) =>{

                    console.log(val)
                    options2.data[0].dataPoints[index] = {
                        y:val.passedquizes , label:val.month
                    }
                }
                )
                setOptions2({...options2})
                 console.log(res.data.QuizRes)
              })
              .catch(err => console.log(err))
    }

    useEffect (()=>{

       getstatistics();
      return{

      }

    },[getstatistics])
    return (
         <div >
            <style jsx="true">
               {
                 `
                 .charts{
                        background:#fff;
                        padding:10px;
                        border-radius:10px;
                    }
                 `
               }


            </style>

            <div className="row">
                <div className="col-md-6 charts " >
                     <CanvasJSChart options = {options}
                    />
                </div>
                <div className="col-md-6 charts">
                        <CanvasJSChart options = {options2}
                        // onRef={ref => this.chart = ref}
                    />
                </div>
            </div>

         </div>
    )
}


export default Statstics
if (document.getElementById('Statstics')) {

    ReactDOM.render(
      <Statstics></Statstics>
    , document.getElementById('Statstics'));
}
