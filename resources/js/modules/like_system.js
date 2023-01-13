import $ from "jquery";

export default class LikeSystem{
    constructor(props){
        this.token = props.token;
        this.video_id = window.location.pathname.slice(1,window.location.pathname.length).split("/")[1];
        this.user_id = props.id;

        this.isLiked(this.user_id, this.video_id);
        this.getLikes(this.video_id);

        // this.like.apply(this, []);
        // this.unlike.apply([this.user_id, this.video_id, this]);
        // $(document).ready(()=>{
        //     $("#like").click(()=>{
        //         alert(999);
        //         this.like(this.user_id, this.video_id);
        //     });
        //     $("#unlike").click(()=>{
        //         this.unlike(this.user_id, this.video_id);
        //     });
        // });
    }
    getData(){
        return this;
    }
    async isLiked(user_id, video_id){
        let arr = [];
        arr.push(user_id);
        arr.push(video_id);
        // like.apply([video_id, user_id]);
        // unlike.apply([video_id, user_id]);
        arr = JSON.stringify(arr);
        let res = await fetch(`/api/isliked/${arr}`);
        res = await res.json();
        if(res === false){
            let a = document.createElement('a');
            a.setAttribute("href", "#");
            a.setAttribute("id", "like");
            a.onclick = this.like.bind(this);
            a.innerHTML = `<i class="fa fa-thumbs-up text-secondary" style="color:grey"></i>`;
            $("#like_form").html(a);
        }else{
            let a = document.createElement('a');
            a.setAttribute("href", "#");
            a.setAttribute("id", "unlike");
            a.onclick = this.unlike.bind(this);
            a.innerHTML = `<i class="fa fa-thumbs-up text-secondary" style="color:green"></i>`;
            $("#like_form").html(a);
        }
    }
    async getLikes(video_id){
        let res = await fetch(`/api/likes/${video_id}`);
        res = await res.json();
        console.log(res);
        let likes = res.length;
        $(`#likes`).text("");
        $(`#likes`).text(`${likes}`);
    }
    async like() {
        let formData = {};
        formData.user_id = this.user_id;
        formData.video_id = this.video_id;
        console.log(JSON.stringify(formData));
        let res = await fetch(`/api/like`, {
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": this.token
            },
            method: 'post',
            body: JSON.stringify(formData)
        });
        res = await res.json();
        console.log(res.status);
        if (res.status === "ok") {
            await this.isLiked(this.user_id, this.video_id);
            await this.getLikes(this.video_id);
            
        }
    }
    async unlike() {
        let formData = [];
        formData.push(this.user_id);
        formData.push(this.video_id);
        formData = JSON.stringify(formData);
        let res = await fetch(`/api/unlike/${formData}`);
        res = await res.json();
        // console.log(res);
        if (res === true) {
            await this.isLiked(this.user_id, this.video_id);
            await this.getLikes(this.video_id);
            
        }
    }


    
}




    
    

    
    
