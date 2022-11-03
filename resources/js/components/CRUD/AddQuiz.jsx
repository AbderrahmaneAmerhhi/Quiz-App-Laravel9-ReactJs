import axios from "axios";
import React, { useEffect, useState } from "react";

import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'
function AddQuiz (){

    const [quizcats,setQuizCats ] = useState();
    const [errors,setErrors] = useState([]);
    const [QuizData,setQuizData] = useState([
        {
        quiz_cate_id:null,
        title:'',
        quizdata:[{

        question:'',
        suggetions:
            [

             {
                suggetion:'',
                correct:false,
             }
            ]
        }]
      }
    ]);
    const [questionsInput,setQuestionsInput] = useState([
        {
           type:'test',
           index:0,
           className:'form-control mx-2',
           id:'Question',
           placeholder:'Question',
           value:'',

           sugg:[
             {
                type:'test',
                index:0,
                className:'form-control mx-2',
                id:'suggestion',
                placeholder:'Suggestion',
                value:'',
                readiocorrecttrueid:'radiotrue0',
                readiocorrectfalseid:'radiofalse0',

             }

           ]
         }
       ]);

    async  function getQuizCategories(){
     await   axios.get('/quizapi/catsapi')
              .then(res=>{

               setQuizCats(res.data);
             })
             .catch(err => console.log(err))
     }
     const handelQuestion =(data,index) =>{
        QuizData[0].quizdata[index] ={
            question :data,
            suggetions:[
                {
                    suggetion:'',
                    correct:false,
                }
            ]

        };
        setQuizData({...QuizData});
        questionsInput[index].value=data;
        setQuestionsInput([...questionsInput])

     }
     const handlsuggestions = (data,qzindex,inputnumber,question) =>{
         if(question.value){
         QuizData[0].quizdata[qzindex].suggetions[inputnumber] = {
             suggetion:data,
             correct:false,
         };
        setQuizData({...QuizData});
        questionsInput[qzindex].sugg[inputnumber].value=data;
        setQuestionsInput([...questionsInput]);
         }else{
            Swal.fire({
                title: 'Error!',
                text: ' the Question field is required!',
                icon: 'error',
                confirmButtonText: 'Ok'
              })
              QuizData[0].quizdata[qzindex].suggetions[inputnumber] = {
                suggetion:'',
                correct:false,
            };
           setQuizData({...QuizData});
         }

     }
     const handelCorrectSugg = (data,qstindex,suggindex,ele) =>{
        if(ele.value){
        QuizData[0].quizdata[qstindex].suggetions[suggindex].correct = data;
        setQuizData({...QuizData});

        }else{
            Swal.fire({
                title: 'Info!',
                text: 'Please fill in the Suggestion field !',
                icon: 'info',
                confirmButtonText: 'Ok'
              })
        }
     }


     const handelQuizCatId =(data) =>{
        QuizData[0].quiz_cate_id =data;
        setQuizData({...QuizData});
     }
     const handelQuiztitle =(data) =>{
        QuizData[0].title = data;
        setQuizData({...QuizData});
     }
     const addQustInput = (index,question) =>{
        if(question.value){
        questionsInput[index]={
                type:'test',
                index:index ,
                className:'form-control mx-2',
                id:'Question'+index,
                placeholder:'Question '+ parseInt(index+1),
                sugg:[
                    {
                       type:'test',
                       index:0,
                       className:'form-control mx-2',
                       id:'suggestion'+(Math.random()*10)+'index0',
                       placeholder:'Suggestion',
                       value:'',
                       readiocorrecttrueid:'radiotrue'+(Math.random()*10),
                       readiocorrectfalseid:'radiofalse'+(Math.random()*10),

                    }]
        };
        setQuestionsInput([...questionsInput])

        }else{

            Swal.fire({
                title: 'Error!',
                text: ' the Question field is required!',
                icon: 'error',
                confirmButtonText: 'Ok'
              })
        }
     }
     const addsuggInput = (suggindex,questindex,ele) =>{
        if(ele.value ){
            questionsInput[questindex].sugg[suggindex]={
                    type:'test',
                    index:suggindex,
                    className:'form-control mx-2',
                    id:'suggestion'+(Math.random()*10)+'index'+suggindex,
                    placeholder:'Suggestion '+ parseInt(suggindex +1),
                    readiocorrecttrueid:'radiotrue'+(Math.random()*10),
                    readiocorrectfalseid:'radiofalse'+(Math.random()*10),
            };

            setQuestionsInput([...questionsInput])

        }else{

             Swal.fire({
                title: 'Error!',
                text: 'Please fill in the Suggestion field !',
                icon: 'error',
                confirmButtonText: 'Ok'
              })
        }


     }
     const removesuggInput = (questindex,ele)=>{
        if(ele.value ){
        // console.log(QuizData[0].quizdata[questindex]);
        // questionsInput[questindex].sugg.splice(index -1,index);
        questionsInput[questindex].sugg.pop(); // pop remove last element from array
        setQuestionsInput([...questionsInput])
        console.log(QuizData[0].quizdata[questindex]);
        // QuizData[0].suggetions.splice(index-1);
        QuizData[0].quizdata[questindex].suggetions.pop();
        setQuizData({...QuizData});
    //    let newsuggsinpt =  questionsInput[questindex].sugg.filter(element =>
    //         element.id != ele.id
    //     )
    //     let newsuggs = QuizData[0].quizdata[questindex].suggetions.filter(element =>
    //          element.suggetion == ele.value
    //         )
    //     setQuestionsInput({...questionsInput,newsuggsinpt})
    //     QuizData[0].quizdata[questindex].suggetions= newsuggs;
    //     setQuizData([...QuizData]);
    //     console.log(QuizData[0].quizdata[questindex].suggetions )
    //     console.log(questionsInput )
    //     console.log(ele)
        }else{
            Swal.fire({
                title: 'Error!',
                text: ' Please fill in the field !',
                icon: 'error',
                confirmButtonText: 'Ok'
              })

        }


     }
     const AddQuiz = () =>{
        axios.post('/quizapi/quiz',QuizData[0])
        .then(res=>{

            // reload window for empty fields
         window.location.reload();

       })
       .catch(err =>{
        setErrors([]);
        setErrors(errors => [...errors, {title:err.response.data.message}])
       })


     }
     const opendprlg = () =>{


        document.querySelector('.btn.dropdown-toggle').addEventListener('click',function(){
         document.querySelector('.dropdown-menu').classList.toggle('show');

        })
      }
     useEffect(() => {
        opendprlg();
        getQuizCategories();
        return () => {

        }
      }, [questionsInput,errors]);


return (

    <div>

        <div className="container mt-5">
            <div className="row mx-auto">
            <div className="col-md-12">
                <div className="card">
                    <div className="card-header">
                        <h3> Add Quiz </h3>
                    </div>
                    <div className="card-body">
                        {

                            errors ? errors.map(element => (
                                 <div class="alert alert-danger d-flex justify-content-between align-items-center">
                                        <ul>
                                           <li>{element.title}</li>
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                            ))

                            : ''
                        }

                        <form >
                            <div className="mb-3">
                            <label htmlFor="qzcat" className="form-label">Quiz Categories</label>
                               <select  onChange={(event) =>{handelQuizCatId(event.target.value)}} className="form-control" name="qzcat" id="qzcat" required>
                                <option selected disabled>Select A Quiz Category</option>
                                {
                                quizcats ? quizcats.map(ele =>
                                        (
                                            <option  value={ele.id}>{ele.title}</option>
                                        )
                                    )
                                    : ''
                                }
                               </select>
                            </div>
                            <div className="mb-3">
                               <label htmlFor="qztitle" className="form-label">Quiz Title</label>
                               <input type="text" onChange={(event) => {handelQuiztitle(event.target.value)}} className="form-control"  id="qztitle" placeholder="title " />
                            </div>


                            {
                                questionsInput.map((element,indx)=>{


                                    return (

                                        <div key={indx} classNamerow>
                                            <div className="row mb-3">
                                                <div className="col-md-8 d-flex justify-content-between align-items-center">
                                                <label htmlFor={element.id} className="form-label">Question</label>
                                                <input type={element.type} value={element.value} onChange={(event) => {handelQuestion(event.target.value,element.index)}} className={element.className}  id={element.id} placeholder={element.placeholder} required/>
                                                </div>
                                                <div className="col-md-4 d-flex justify-content-between align-items-center flex-row">

                                                        <button   type="button" className="btn btn-primary" onClick={() => addQustInput( QuizData[0].quizdata.length,element)}> + </button>
                                                </div>

                                            </div>
                                            {
                                                    element.sugg.map((ele,index)=>(

                                                    <div className="mb-3 row" key={index}>
                                                        <div className="col-md-8 d-flex justify-content-center align-items-center flex-row">
                                                        <label htmlFor={ele.id} className="form-label">Suggestion </label>
                                                        <input type={ele.type} value={ele.value} className={ele.className}  id={ele.id}  placeholder={ele.placeholder} onChange={(event) => {handlsuggestions(event.target.value,element.index,ele.index,element)}} />
                                                        </div>

                                                        <div className="col-md-4 d-flex justify-content-between align-items-center flex-row">
                                                            <label htmlFor={ele.readiocorrecttrueid} className="form-label">TRUE </label>
                                                            <input type="radio" class="form-check-input" name={'correct'+element.index+'_'+ele.index} id={ele.readiocorrecttrueid} value='true' onChange={(event)=>{handelCorrectSugg(event.target.value,element.index,ele.index,ele)}}/>
                                                            <label htmlFor={ele.readiocorrectfalseid} className="form-label">FALSE </label>
                                                            <input type="radio" class="form-check-input"  name={'correct'+element.index+'_'+ele.index} id={ele.readiocorrectfalseid} value='flase' onChange={(event)=>{handelCorrectSugg(event.target.value,element.index,ele.index,ele)}}  />
                                                            <button   type="button" className="btn btn-success" onClick={() => addsuggInput( QuizData[0].quizdata[element.index].suggetions.length,element.index,ele)}> +</button>
                                                            <button   type="button" className="btn btn-danger" style={{ display : ele.index>0 ? 'block': 'none' }} onClick={() => removesuggInput(element.index,ele)}> - </button>
                                                        </div>
                                                    </div>
                                                ))
                                            }
                                        </div>

                                    )
                                  })
                                }
                            <button  type="button" onClick={() => AddQuiz()} className="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
)

}

export default AddQuiz
