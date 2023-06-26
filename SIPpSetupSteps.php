                          SIPp configuration and installation setup With Steps :-  

 

 

 

Install package in server in which want to setup, by using command :-  apt-get install dh-autoreconf libsctp-dev libpcap0.8-dev libpcap-dev libnet-dev libgsl0-dev libncurses5-dev libncursesw5-dev pcaputils 

 

Download sipp3.3 source from https://sourceforge.net/projects/sipp/ in local system or PC. 

 

Now copy the tar file from local to above server by using command :- scp -i /home/inextrix/devang_astpp.pem /home/inextrix/Downloads/sipp-3.3.tar.gz root@168.119.48.166://usr/src/ 
                                                     OR  
(You can also download from github through git clone by using  https://github.com/prashantkumar1994/SIPpSetupRepo.git  link) 
 

 

Now Go to src directory by using command :-  cd /usr/src/ 

 

Now untar the file by using tar -xzvf sipp-3.3.tar.gz command. 

 

Now go to sipp-3.3/ directory by using cd sipp-3.3/ command.  

 

Now run below command :-  
autoreconf -ivf; ./configure --with-sctp --with-pcap --with-openssl;  

 

Now run autoreconf -ivf; ./configure --with-sctp --with-pcap --with-openssl; make pcapplay_ossl command for compile sipp-3.3 

 

Now you  can simply check sipp call by using ./sipp 160.242.81.210 -m 1 -s 123456789 command (it may be get error due to configuration issue.) 

 

Now make custom pcapplay_ossl file or you also clone by using below command :-  
         git clone https://github.com/saghul/sipp-scenarios.git 

                                                           OR 

                     Git clone –b master https://github.com/saghul/sipp-scenarios.git 

 

Now go to ' cd /usr/src/sipp-3.3/sipp-scenarios/ directory. 

 

Change path of pcap file by using vim sipp_uac_pcap_g711a.xml command. (this file, sipp-scenarios/sipp_uac_pcap_g711a.xml, might need to change pcap file path >>  we replaced the path with '/usr/src/sipp-3.3/sipp-scenarios/g711a.pcap') 

 

For example to run SIPp Command for generated calls :-  root@AlphaQA:/usr/src/sipp-3.3# ./sipp 142.132.184.134:5076 -sf sipp-scenarios/sipp_uac_pcap_g711a.xml -r 1 -rp 2000 -l 100 -m 1 -s 10990004 

 

 

 

 

************************************************************************************* 

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 

 

             SIPp Call testing setup steps for generate Calls in particular server. 

 

GUI Login into server in which server you want to route the call and generate calls. 

whitelist the IP of Caller server or SIPp tool Server by using select account (where SIPp tool are already installed into Caller server). 

call configuration check proper for above selected Account. (like :- balance, RG, OR, TR, Trunk, gateway etc) 

From terminal, SSH login into caller server in which server SIPp tool installed. 

now Go to cd /usr/src/sipp-3.3/ 

now edit below SIPp command as per set server IP with SIP profile port, where you want to send Call to server. 
 ./sipp 142.132.184.134:5076 -sf sipp-scenarios/sipp_uac_pcap_g711a.xml -r 1 -rp 2000 -l 100 -m 1 -s 103500 

now run the above command and check into above GUI server. 
 
 By modify above SIPp command, as per need you can generate number of calls as per set CC and CPS value  
 some keyword's value are there as below we need to change for generate calls as per requirement. 
-s : - Destination Number (which number you want to dial) 
-m  :- number of Calls  (which you want to wish dial how many number of calls like :- 50 calls or 100 calls etc ,at a time) 
-l : -  CC calls (running Calls, as you want to sent number of call running at same time each together.) 
 -rp :-  Time Duration of call (In which second you want to sent calls) 
-r :- CPS Call per second (how many calls you want to sent call in at a time.) 

 

************************************************************************************* 

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 

 

************************************************************************************* 

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 

 

                    Steps For generate SIPp Calls through csv files : - 

 

1. First SSH with server which have SIPp tool installed. 

2. Now go to cd /usr/src/sipp-3.3/sipp-scenarios/ directory 

3. Now create new xml file of sipp_uac_pcap_g711a.xml by using cp command. 

             For Example:-  sipp_uac_pcap_g711a.xml PkCalls.xml 

4. Now open above new created file by using vim/nano command and replace service keyword with field0 keyword where available into XML file, and after save this file. 

5. Now go to path :  cd /usr/src/sipp-3.3/ 

6. Now create CSV file which contain DID numbers into this file. (You need to add SEQUENTIAL keyword into 1st column and then add DID number as destination of Server, where you want to send bulk calls) and save the above CSV file. 
    For  example :-  PkCalls.csv 

7. Now use this command and change IP and port of server as below :-  

./sipp 95.217.238.195:5078 -sf sipp-scenarios/PkCalls.xml -r 1 -rp 1 -l 1 -m 1 -inf PkCalls.csv 

 

************************************************************************************* 

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 

 

./sipp 95.217.238.195:5076 -sf sipp-scenarios/sipp_uac_pcap_g711a.xml -i 5.75.226.233 -r 2 -rp 2000 -l 2 -m 1 -s 10000010330 

 

 

 