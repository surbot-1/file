
const express = require('express'); 
const app = express(); 

  

var computerSciencePortal = "GeeksforGeeks"; 

  

app.get('/' , (req,res)=>{ 

   // Server will send GeeksforGeeks as response 

   res.send(computerSciencePortal);  
}) 

  
// Server setup 
app.listen(4000 , ()=>{ 

    console.log("server running"); 
});
