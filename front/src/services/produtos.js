import {http} from './config'

export default {
    listar:()=>{
        return http.get('produtos')
    },
    
    /*
     
    
    salvar:()=>{
        return http.post('produto')
    }
    /*/
}