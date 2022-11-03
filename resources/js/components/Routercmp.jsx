import ReactDOM from 'react-dom';
import { BrowserRouter as Router,Routes,Route } from 'react-router-dom';
import Quize from "./Quiz";
import Quizes from './Quizes';
import AddQuiz from './CRUD/AddQuiz';



 function Routercmp(){

 return (
   <h1>hello</h1>
 )
}

export default Routercmp;

if (document.getElementById('Quize')) {

    ReactDOM.render(
       <Router forceRefresh={true}>
            <Routes >
                <Route exact={true}  path="/quiz/pass/:id" element={<Quize /> } />
                <Route exact={true}  path="/quiz" element={<Quizes /> } />
                <Route exact={true}  path="/quiz/Add" element={<AddQuiz /> } />
            </Routes>
         </Router>
    , document.getElementById('Quize'));
}
