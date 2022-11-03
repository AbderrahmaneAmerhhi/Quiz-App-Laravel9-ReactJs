import axios from "axios";
import React, { useEffect, useState } from "react";
import ReactDOM from 'react-dom';
import Swal from 'sweetalert2/dist/sweetalert2.js'

import { Link, redirect } from "react-router-dom";

function Quizes(){

    const [userrole,setUserRole] = useState();
    const [quizcats,setQuizCats ] = useState();
    const [quizes,setQuizs ] = useState();

    const getQuizeCats = () => {
        axios.get('/quizapi/catsapi')
        .then(res=>{

         setQuizCats(res.data);
       })
       .catch(err => console.log(err))
    };
    const getQuizes = () => {
        axios.get('/quizapi/quiz')
        .then(res=>{
           setQuizs(res.data.data);
       })
       .catch(err => console.log(err))
    }
    const getQuizesByCategory = (cat)=>{
    axios.get(`/quizapi/quiz/${cat.id}/quizbycatid`)
        .then(res=>{
           setQuizs(res.data.data);
       })
       .catch(err => console.log(err))
    }

    const opendprlg = () =>{


        document.querySelector('.btn.dropdown-toggle').addEventListener('click',function(){
         document.querySelector('.dropdown-menu').classList.toggle('show');

        })
      }
     const trashQuiz = ($id) =>{
        axios.delete(`http://127.0.0.1:8000/quizapi/quiz/${$id}`)
             .then(res=>{
                   console.log(res)
                   Swal.fire({
                    title: 'success',
                    text: res.data,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  })
                   getQuizeCats();
                   getQuizes();
             })
             .catch(err => console.log(err))
     }
    useEffect(()=>{
        opendprlg();
        getQuizeCats();
        getQuizes();
        if(document.querySelector('meta[name="UserRole"]')){
            setUserRole(document.querySelector('meta[name="UserRole"]').content);
        }else{
            setUserRole('');
        }

    },[])
return (

    <div>
     <div className="container mt-5">
        <div className="row">
            <div className="col-md-12">
                <div className="card">
                    <div className="card-header d-flex justify-content-between align-items-center">
                        Quizes
                        {userrole  == 'teacher' || userrole  == 'admin' ? (
                         <Link className="btn " to="/quiz/Add">
                        <i className="bx bx-plus"></i>
                        </Link>
                         ) : ''
                       }


                    </div>
                    <div className="mt-5 body-content ">
                        <div className="row">
                            <div className="col-md-4 card" >
                               <div className="card-header">
                                    Quizes Categories
                                </div>
                                <ul className="list-group list-group-flush">
                                    {

                                        quizcats ? quizcats.map( (ele,index) =>   (
                                       <li className="list-group-item"><a className="quizlink"  onClick={() => getQuizesByCategory(ele)} >{ele.title}</a></li>


                                     ))
                                     : ''
                                    }
                                </ul>
                            </div>
                            <div className="col-md-8 card" >
                               <div className="card-header">
                                    Quizes
                                </div>
                                <ul className="list-group list-group-flush  " >
                                    {

                                          quizes  ? quizes.map( (ele,index) =>   (
                                       <li className="list-group-item d-flex justify-content-between">
                                         <Link className="btn " to={'/quiz/pass/'+ele.id} >
                                            {ele.title}
                                          </Link>
                                         {userrole  == 'teacher' || userrole  == 'admin' ? (
                                           <div className="btn btn-danger" onClick={()=>trashQuiz(ele.id)}><i class='bx bxs-trash-alt'></i></div>
                                         )
                                         :
                                         ''
                                         }
                                        </li>


                                     ))
                                     : ''
                                    }
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
)
}

export default Quizes
if (document.getElementById('Quizes')) {

    ReactDOM.render(
      <Quizes></Quizes>
    , document.getElementById('Quizes'));
}
