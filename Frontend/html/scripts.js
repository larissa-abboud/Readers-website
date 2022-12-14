const readers_pages = {};


const base_url = "http://127.0.0.1:8000/api/";

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
    /**
     * take input and use api
     * 
     */
    
    
    const btn_login = document.getElementById("login-btn");
    const redirect_btn = document.getElementById("register-redirect");
    const res = document.getElementById("result");
    
    
    const login = async () => {
        const login_url = base_url + "v1/login"; //add url to login route

    
        const data = new URLSearchParams();
        data.append("email", document.getElementById("email").value);
        data.append("password", document.getElementById("password").value);
        //get value
    
        const response = await readers_pages.postAPI(login_url, data);
        /**if  missing input 
         * if auth error
         * else succes
         */

        result.innerHTML =
            '<div id = "response" class = "result">' +
            data +
            "</div>";
            
        if (response.status == 400) {
            //display error
            result.innerHTML =
            '<div id = "response" class = "result">' +
            'missing input' +
            "</div>";
         
        }else if(response.data.error) {
            res.innerHTML =
            '<div id = "response" class = "result">' +
            'error' +
            "</div>";
            //display error
        
        }
        else {
          // Save  data in the local storage
          const userData = [];
          const user_id = response.data.id;
          const name = response.data.name;
          const username = response.data.username;
          const email = response.data.email;
          const user_token = response.data.access_token;

    
          userData.push({ user_id, name, username, email ,user_token});
          localStorage.setItem("userData", JSON.stringify(userData));
          if( btn_login){
            btn_login.addEventListener("click", function(){
                window.location.href = "home.html";
            });}
    
          
          
        }
      }
      //
      
      if (redirect_btn){
        redirect_btn.addEventListener("click", function(){
        window.location.href = "signup.html";
    });
    
    }
    

}
readers_pages.load_signup=()=>{
    const btn_signup = document.getElementById("signup-btn");
    const redirect_btn = document.getElementById("login-redirect"); 
    const signup = async () => {
        const signup_url = base_url + "v1/register";
    
        const data = new URLSearchParams();
        data.append("name", document.getElementById("name").value);
        data.append("username", document.getElementById("username").value);
        data.append("email", document.getElementById("email").value);
        data.append("password", document.getElementById("password").value);
        data.append("admin3");
    
        const response = await readers_pages.postAPI( //add data to db
          signup_url,
          data
        );
        if (response.data.Error) {
          //fail

        } else {
          //succes
          if( btn_signup){

            btn_signup.addEventListener("click", function(){
                window.location.href = "home.html";
            });}  
        }
      };
      if (redirect_btn){
        redirect_btn.addEventListener("click", function(){
        window.location.href = "login.html";
    });}
    
    
}
readers_pages.load_home=()=>{
    
}
readers_pages.load_profile=()=>{
    
}

