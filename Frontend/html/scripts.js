const readers_pages = {};


const base_url = "http://localhost/";

readers_pages.Console = (title, values, oneValue = true) => {
    console.log('---' + title + '---');
    if(oneValue){
        console.log(values);
    }else{
        for(let i =0; i< values.length; i++){
            console.log(values[i]);
        }
    }
    console.log('--/' + title + '---');
}

readers_pages.loadFor = (page) => {
    eval("readers_pages.load_" + page + "();");
}

readers_pages.getAPI = async (api_url) => {
    try{
        return await axios(api_url);
    }catch(error){
        readers_pages.Console("Error from Linking (GET)", error);
    }
}

readers_pages.postAPI = async (api_url, api_data, api_token = null) => {
        try{
            return await axios.post(
                api_url,
                api_data,
                {
                    headers:{
                        'Authorization' : "token " + api_token
                    }
                }
            );
        }catch(error){
            readers_pages.Console("Error from Linking (POST)", error);
        }
}

readers_pages.load_landing = async () => {
    /**
     * redirect to sign up or login
     * 
     */
    const btn_signup = document.getElementById("signup");
    const btn_login = document.getElementById("login");
    btn_login.addEventListener("click", function(){
        window.location.href = "login.html";
    });
    btn_signup.addEventListener("click", function(){
        window.location.href = "signup.html";
    });


   

}

readers_pages.load_login=()=>{

}
readers_pages.load_signup=()=>{
    
}
readers_pages.load_home=()=>{
    
}
readers_pages.load_profile=()=>{
    
}

readers_pages.load_profile = () => {
    alert("HI FROM PROFILE PAGE");
}