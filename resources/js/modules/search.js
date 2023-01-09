
async function search($data){
    let res = await fetch("/api/index.php?page=search",{
        method : "POST",
        body:JSON.stringify($data)
    });
    res = await res.json();
    if(res.length >=1){
        $("#content").html("");
        $("#content").append(`<h3>Search Result</h3>`);
        res.forEach((v)=>{

           $("#content").append(`
                <div>
                    <a href="watch.php?from=search&video_id=${v.id}">
                        ${v.singer} ___ ${v.title}
                    </a>
                    <hr>
                </div>
           `);
        });
    }
}

$("#search_form").submit(async (event) => {
    event.preventDefault();
    let data = {};
    data.page = "search";
    data.search = document.getElementById("search").value;
    await search(data);
});