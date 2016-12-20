#include INstagramApi
<?php

//Hey Sven
// hier müssen zuerst die Daten und die settings übergeben werden, die der bot braucht
//Das hier ist jetzt nur pseudo code zur veranschaulichung


bot = InstaBot(login="username", password="password",
               like_per_day=$likesperday,
               comments_per_day=$commentsperday,
               tag_list=['follow4follow', 'f4f', 'cute'] or $taglist[],
               tag_blacklist=['rain', 'thunderstorm'] or $tagblacklist[],
               user_blacklist=$userblacklist[],
               max_like_for_one_tag=50,
               follow_per_day=300 or $followperday,
               follow_time=1*60,
               unfollow_per_day=300,
               unfollow_break_min=15,
               unfollow_break_max=30,
               log_mod=0,
               proxy='' or $proxy,
               # Use unwanted username list to block users which have username contains one of this string

               unwanted_username_list=['second','stuff','art','project','love','life','food','blog','free','keren','photo','graphy','indo',
                                       'travel','art','shop','store','sex','toko','jual','online','murah','jam','kaos','case','baju','fashion',
                                        'corp','tas','butik','grosir','karpet','sosis','salon','skin','care','cloth','tech','rental',
                                        'kamera','beauty','express','kredit','collection','impor','preloved','follow','follower','gain',
                                        '.id','_id','bags'],
               bot_running_hour_start = 0,
               bot_running_hour_end = 23
			   #Change these to whatever hours you like
			   ##The bot will only run during these hours and sleep 
			   ### HOURS BETWEEN 0-24 ONLY!!!!!!!!!!!!!!!!


			   #### EXAMPLE 1
			   #####bot_running_hour_start = 5,
			   #####bot_running_hour_end = 16

               )

//Constructor

$debug: Boolean. Debug mode (Optional)
$truncatedDebug:Boolean. Truncates Instagrams responses to 1000 chars in debug log (Optional)

$i = new \InstagramAPI\Instagram($debug, $truncatedDebug);

//Login
//Once you have initialized InstagramAPI class, you can login:

$i->setUser($username, $password);
$i->login();
/*Your session will be stored in data/username folder. If you have set any other custom data path, a data folder will be created inside it.

InstagramAPI
|-- src
|    |-- data 
|    |    |-- username
|    |    |    |-- username-cookies.dat
|    |    |    |-- settings-username.dat
username-cookies.dat contains your session.
settings-username.dat contains essential information for the API about your account.
Both files are generated automatically by the API.

If you want to manage more accounts at once, you can switch accounts using this: */

$i->setUser($user2, $passwd2);


//Username ID

//As you can see while using the API, most of the function requires a param called $usernameId. This is an integer that represents a unique id for the username. For example:

//MyUsername ---> 1959226924

//If you don't know how to obtain this id, don't worry about it, i made a function for that: getUsernameId

$a = $i->getUsernameId('MyUsername');

//$a now contains 1959226924

//Managing responses

//When you do a request, you can obtain all the information easily as all responses are objects, for example:

$a = $i->getUsernameInfo($usernameId);
echo $a->getUsername(); // this will print username of user with id $usernameId 

//You can find all responses and functions here.

//Setting a proxy

//Note: Using proxys in the API works fine, so if you don't get any response it's because Instagram server is refusing to connect with it.

$ip = "http://211.63.185.211";
$port = "8080";
$i->setProxy($ip,$port);
//or

$ip = "http://211.63.185.211:8080";
$i->setProxy($ip);


//Pagination

//Everytime we scroll down in our devices to load more data(followers, photos, conversations...), that's called pagination.

//When you get Instagram's response, it could contain a next_max_id key, that means there are more data you can load. In order to paginate, you will have to pass that param to the function. Here is an example:

$a = null;
do{
   if(is_null($a))
         $a = $this->getUserTotalFollowings($usernameId);
   else 
         $a =  $this->getUserTotalFollowings($usernameId, $a->getNextMaxId());
} while(!is_null($a->getNextMaxId()));
//Example: PaginationExample.php

//Uploading media

//Uploading photos

uploadPhoto($photo, $caption = null, $upload_id = null, $customPreview = null, $location = null, $filter = null)

//$photo is the path to the photo. ie: /desktop/cat.jpg

//Keep $upload_id as null, that is managed automatically by the API.

$i->uploadPhoto($photo, $caption);

//Uploading video

uploadVideo($video, $caption = null, $customPreview = null)

$i->uploadVideo($photo, $caption);


//Uploading photo to Stories

uploadPhotoStory($photo, $caption = null, $upload_id = null, $customPreview = null)

//$photo is the path to the photo. ie: /desktop/cat.jpg

//Keep $upload_id as null, that is managed automatically by the API.

$i->uploadPhotoStory($photo, $caption);

//Functions
/*
Note: Not all functions are listed here

Login and switch between accounts
Upload Photo and video
Direct share media to a friend
Edit media (change caption)
Remove self tag from a media
Get info of an uploaded media
Delete photo or video
Post/delete a comment in a media
Get media comments
Set profile picture and delete profile picture
Setting private/public account
Get and edit profile data
Get username info
Get recent activity (news inbox)
Get recent activity from followed users
Get user tags
Get media likers
Get liked media
Get Geo media
Search users
Search users using address book
Get timeline
Get user feed
Search Location
Get self and popular feed
Get Followings / followers
Like/unlike a video or photo
Backup all your uploaded photos
Follow / Unfollow
Block/unblock user
Login and switch between accounts

Login and logout*/

$i->login();
I dont recommend logging out.

$i->logout();
Switch account

$i->setUser($user2, $passwd2);
Upload Photo and video

$i->uploadPhoto($pathToImage, $caption = null);
Video requires ffmpeg

$i->uploadVideo($pathToVideo, $caption = null);
Direct share media to a friend

$media_id is a id from an already uploaded media

$i->direct_share($media_id, $recipients, $text = null);
Edit media (change caption)

$i->editMedia($mediaId, $captionText = '');
Remove self tag from a media

$i->removeSelftag($mediaId);
Get info of an uploaded media

$i->mediaInfo($mediaId);
Delete photo or video

$i->deleteMedia($mediaId);
Post/delete a comment in a media

$i->comment($mediaId, $commentText);
delete

$i->deleteComment($mediaId, $commentId);
Get media comments

$i->getMediaComments($mediaId);
Set profile picture and delete profile picture

Set

$i->changeProfilePicture($pathToPicture);
Delete

$i->removeProfilePicture();
Setting private/public account

Private

$i->setPrivateAccount();
Public

$i->setPublicAccount();
Get and edit profile data

Get profile data

$i->getProfileData();
Edit profile data

   * @param string $url
   *   Url - website. "" for nothing
   * @param string $phone
   *   Phone number. "" for nothing
   * @param string $first_name
   *   Name. "" for nothing
   * @param string $email
   *   Email. Required.
   * @param int $gender
   *   Gender. male = 1 , female = 0
$i->editProfile($url, $phone, $first_name, $biography, $email, $gender)
Get username info

$i->getUsernameInfo($usernameId);
Get self username info

$i->getSelfUsernameInfo();
Get recent activity (news inbox)

$i->getRecentActivity();
Get recent activity from followed users

$i->getFollowingRecentActivity();
Get user tags

$i->getUserTags($usernameId);
Get user tags

$i->getSelfUserTags();
Get tagged media

$i->tagFeed($tag);
Search tags

$i->searchTags($query);
Get media likers

$i->getMediaLikers($mediaId);
Get liked media

$i->getLikedMedia();
Get Geo media

$i->getGeoMedia($usernameId);
Get self geomedia

$i->getSelfGeoMedia();
Search users

$i->searchUsers($query);
Search exact username

$i->searchUsername($usernameName);
Search users using address book

$contacts is an array of contact, each contact has these values:

phone_numbers which is an array of the numbers the contacts has
first_name Name of the contact (string)
email_addresses array of the mails the contact has
$i->syncFromAdressBook($contacts);
Get timeline

$i->getTimeline();
Get user feed

 $i->getUserFeed($usernameId, $maxid = null, $count = null)
Get hastag feed

$i->getHashtagFeed($hashtagString, $maxid = null);
Search Location

$i->searchLocation($query);
Get location feed

$i->getLocationFeed($locationId, $maxid = null);
Get self and popular feed

Self

$i->getSelfUserFeed();
Popular

$i->getPopularFeed();
Get Followings / followers

Get user followings

$i->getUserFollowings($usernameId, $maxid = null);
Get user followers

$i->getUserFollowers($usernameId, $maxid = null);
Get self user followers

$i->getSelfUserFollowers();
Get self users following

$i->getSelfUsersFollowing();
Like/unlike a video or photo

$i->like($mediaId);
unlike

$i->unlike($mediaId);
Backup all your uploaded photos

$i->backup();
Follow / Unfollow

follow

$i->follow($userId);
Unfollow

$i->unfollow($userId);
Block/unblock user

$i->block($userId);
unblock

$i->unblock($userId);
:)

?>