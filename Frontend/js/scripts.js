const workshop_pages = {};

const base_url = "http://localhost/mobile/";

workshop_pages.Console = (title, values, oneValue = true) => {
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

workshop_pages.loadFor = (page) => {
    eval("workshop_pages.load_" + page + "();");
}

workshop_pages.getAPI = async (api_url) => {
    try{
        return await axios(api_url);
    }catch(error){
        workshop_pages.Console("Error from Linking (GET)", error);
    }
}

workshop_pages.postAPI = async (api_url, api_data, api_token = null) => {
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
            workshop_pages.Console("Error from Linking (POST)", error);
        }
}

workshop_pages.load_landing = async () => {
   

}

workshop_pages.load_profile = () => {
    alert("HI FROM PROFILE PAGE");
}