var userId;
var currentUserId;
function deleteUser(userId, currentUserId) {
    if (!confirm("Are you sure to delete this user")) {
           return false;
    }
   
    if (userId == currentUserId) {
          alert('Can not delete your self');
          return false;
    }
   
    return true;
}