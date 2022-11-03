import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import { useState } from 'react';
import {  useParams } from 'react-router-dom'
import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
function Quize() {

      let params = useParams();
       /*********** start quize      **************/
       const [quizId,setQuizId] = useState();
       const [userId,setUserId] = useState();
    const [Questions,setQuestions] = useState(
        [
            {
                question :"",
                suggetions: []
          },
        ]

    );
     /********* open language dropdown ******/
     const opendprlg = () =>{


       document.querySelector('.btn.dropdown-toggle').addEventListener('click',function(){
        document.querySelector('.dropdown-menu').classList.toggle('show');

       })
     }



    const  getQuiz = async()=>{
        try{
            const response = await fetch('/quizapi/quiz/'+params.id);
            const json = await response.json();
            console.log(json)
            setQuizId(json.id);
            let data = json.quizdata
            setQuestions(data);
            console.log(Questions)
        }catch(err){

            console.log(err)
        }

    }
    const setResult = () =>{

        axios.post('/quizapi/results',
        {
         user_id:userId,
         quizze_id: quizId,
         note:score

         })
        .then(res=>{
            Swal.fire({
                title: 'Success',
                text: 'The Quize Result Adde Successfuly ',
                icon: 'success',
                confirmButtonText: 'Ok'
              })
          console.log(res)
       })
       .catch(err => console.log(err))
    }

    const [quizindexa,setQuizIndexa] = useState(0);
    const [quizindexb,setQuizIndexb] = useState(1);
    const [next,setNext] = useState(false);
    const [select,setSelect] = useState(false);
    const [score,setScore] = useState(0);
    const [showScore,setShowScore] = useState(false);
    const [ShowQuiz,setShowQuiz] = useState(true);

    const selectResp = (element) =>{
        setSelect(true);
        setNext(true);
        if(element.correct == 'true'){
            setScore(score+1)
        }

    }
    const click = (ele) =>{
     if(ele.correct == 'true'){
        return 'suggestion correct';

     }else{
       return 'suggestion incorect'
     }
    }
    const Skip = () =>{

         if(Questions.length <= quizindexb){
            setShowScore(true);
            setShowQuiz(false);
            // add rsult
            // setResult();
         }else{
            setQuizIndexa(quizindexa+1);
            setQuizIndexb(quizindexb+1);
            setSelect(false);
            setNext(false);
         }

       }
    function nextQust(){
         if(!next){
            return
         }
         if(Questions.length <= quizindexb){
            setShowScore(true);
            setShowQuiz(false);
            // add result
            setResult();
         }else{
            setQuizIndexa(quizindexa+1);
            setQuizIndexb(quizindexb+1);
            setSelect(false);
            setNext(false);
         }
    }
    const restar = () =>{
        setQuizIndexa(0);
        setQuizIndexb(1);
        setShowScore(false);
        setShowQuiz(true);
        setScore(0);
        setSelect(false);
        setNext(false);
    }

    useEffect(()=>{
        if(document.querySelector('meta[name="userid"]')){
            setUserId(document.querySelector('meta[name="userid"]').content);
        }else{
            setUserId('');
        }
        getQuiz();

        opendprlg();


        return {


        }
    },[])
    return (
        <div className="container mt-5">

            <style jsx="true">
                {
                 `
                    .question-box{
                        padding: 5px;
                        background: #74EBD5;
                        border-radius: 5px;
                        text-align: center;
                        line-height: 10px;
                        }
                        .question{

                            margin-top:10px;
                        }
                        .suggestion-list{
                            padding: 20px;
                            text-align: center;
                        }
                        .suggestion{
                            margin: 20px;
                            padding: 15px;
                            cursor: pointer;
                            border: 1px solid #e6e6e6;
                            border-radius: 20px;
                        }
                        .suggestion:hover{

                          background:#74EBD5;
                        }
                        .footer-buttons{
                           display:flex;
                           justify-content:space-around;
                           align-items:center
                        }
                        .footer-buttons button,.score-box button{

                            background: transparent;
                            border: 1px solid #e1e1e1;
                            padding: 7px;
                            border-radius: 5px;
                            width: 100px;
                            background: #8dcaf82b;

                        }
                        .score-box{

                            display: flex;
                            justify-content: center;
                            align-items: center;
                            flex-direction: column;
                            margin-bottom: 20px;
                        }
                        .suggestion.correct{
                          background:#35cb35;
                        }
                        .suggestion.incorect{
                            background:#db4646;
                        }

                    `
                    }
            </style>

            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Pass A Quiz</div>
                        <div className="card-body">

                            {

                              ( Questions ? Questions.slice(quizindexa,quizindexb).map( (ele,index) =>(
                                <div key={ele.id} style={{  display: ShowQuiz === true ? 'block' :'none'}}>
                                    <div className="question-box">
                                         <p  className="question">{ele.question}</p>
                                    </div>
                                    <div className="suggetions-box">
                                    <ul className='suggestion-list'>
                                        {

                                       ele ? ele.suggetions.map((element,indx) =>(
                                            <li  onClick={() => selectResp(element)}   className={select === true ? click(element) : 'suggestion'} key={indx}>{element.suggetion}</li>

                                        )) : ''
                                        }

                                    </ul>
                                    </div>


                                 </div>
                              )): ''

                              )
                            }
                             <div className="score-box " style={{  display: showScore === true ? 'flex' :'none'}}>
                                    <p>
                                        Your Score is <span className='score'>{score} / {quizindexb}</span>
                                    </p>
                                    <button onClick={() => restar()}>Restar</button>
                                    </div>
                                    <div className="quiz-footer">
                                    <div className="footer-buttons">
                                        <button onClick={() => Skip()}>Skip</button>
                                        <button  onClick={nextQust}>Next</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    );
}


export default Quize;

// if (document.getElementById('Quize')) {

//     ReactDOM.render(
//         <Quize />
//     , document.getElementById('Quize'));
// }
