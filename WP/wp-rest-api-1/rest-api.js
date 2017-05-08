    //Load More Posts
    var portfolioPostsBtn = document.getElementById("portfolio-posts-btn");
    var portfolioPostsContainer = document.getElementById("portfolio-posts-container");
    
    
    if(portfolioPostsBtn){
        portfolioPostsBtn.addEventListener("click", function(){
           
            var ourRequest = new XMLHttpRequest();
            ourRequest.open('GET', 'http://localhost/japasty/wp-json/wp/v2/posts?order=asc');
            
            ourRequest.onload = function(){
                if(ourRequest.status >=200 && ourRequest.status <400){
                    var data = JSON.parse(ourRequest.responseText);
                    createHTML(data);
                    portfolioPostsBtn.remove();
                    //console.log(data);
                }
                else{
                    console.log("We connected to the server, but it returned an error");
                }
            };
            
            ourRequest.onerror = function(){
                console.log("Connection error");
            };
            
            
            ourRequest.send();
            
        });
    }
    
    
    //load data at html page
    function createHTML(postData){
        var ourHTMLString = '';
        var i = 0;
        for(i = 0; i<postData.length; i++){
            
            ourHTMLString += '<a href="'+ postData[i].link +'"><h2>' + postData[i].title.rendered + '</h2></a>'; 
            ourHTMLString += '<p>' + postData[i].excerpt.rendered + '</p>'; 
        }
        
        portfolioPostsContainer.innerHTML = ourHTMLString;
    }
    
    
    

    //create post
    var quickAddButton = document.querySelector("#quick-add-button");
    
    if(quickAddButton){
        
        quickAddButton.addEventListener("click", function(){

            var ourPostData = {
                "title":document.querySelector('.admin-quick-add [name="title"]').value,
                "content":document.querySelector('.admin-quick-add [name="content"]').value,
                "status": "publish"
            }
            
            var createPost = new XMLHttpRequest();
            createPost.open("POST", "http://localhost/japasty/wp-json/wp/v2/posts");
            createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
            createPost.setRequestHeader("Content-Type", "application/json");
            createPost.send(JSON.stringify(ourPostData));
            
             
        });
    }
    