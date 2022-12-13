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
    /**
     * take input and use api
     * 
     */
    const btn_login = document.getElementById("login-btn");
    const redirect_btn = document.getElementById("register-redirect");

    const login = async () => {
        const login_url = base_url + ""; //add url to login route
    
        const login_data = new URLSearchParams();
        login_data.append("email", document.getElementById("email").value);
        login_data.append("password", document.getElementById("password").value);
        //get value
    
        const response = await readers_pages.postAPI(login_url, login_data);
        /**if  missing input 
         * if auth error
         * else succes
         */
        if (response.status == 400) {
            //display error
         
        }else if(response.data.error) {
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
    
          // go to home page
          
        }
      };
    if (redirect_btn){
        redirect_btn.addEventListener("click", function(){
        window.location.href = "signup.html";
    });
    }
    

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