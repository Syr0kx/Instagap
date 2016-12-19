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

			   #### EXAMPLE 2
			   #####bot_running_hour_start = 22,
			   #####bot_running_hour_end = 4
               
			   #### BOTH OF THESE ARE VALID HOURS AND WORK!
               )



?>