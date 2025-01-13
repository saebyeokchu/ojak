
//common
function addCookie(name, value){
    document.cookie = name +"=" + value + "; path=/; ";
}

function getCookieByName(name) {
    const cookies = document.cookie.split(';');
    for (let cookie of cookies) {
        cookie = cookie.trim();
        if (cookie.startsWith(name + '=')) {
            return cookie.substring(name.length + 1);
        }
    }
    return null;
}

function eraseCookie(name) {   
    document.cookie = name+'=; path=/; Max-Age=-99999999;';  
}

function getAllUrl(){
    return getUrl(0,0);
}

function getUrl(id, gubun, pageIndex=1) {
    const urls = {
        'communityEditor' : "/community/edit?id="+id+"&gubun="+gubun+"&pageIndex="+pageIndex,
        'communityDetail' : "/community/detail?id="+id+"&gubun="+gubun+"&pageIndex="+pageIndex,
        'communityNotice' : "/community/notice?pageIndex="+pageIndex,
        'communityEvent' : "/community/event?pageIndex="+pageIndex,
        'communityQna' : "/community/qna?pageIndex="+pageIndex,
    };
    return urls;
}
