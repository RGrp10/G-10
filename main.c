#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <conio.h>
#include <windows.h>
#include <mysql.h>

char code[4];
char query1[255];
char query2[255];
char query3[255];
char query4[255];
char query5[255];
char query6[255];
char sqlquery[255];
MYSQL_RES *res;
MYSQL_ROW row;
MYSQL* conn;
int k[7][5], com, n, i, j;
char ID[4];
char datefrom[12];
char dateto[12];
int score=0, choice, rec;

    struct alphabet{
		char letter;
		int position[7][5];
	};
	struct alphabet alphabet_array[26]={
    {'A', {{0,0,1,0,0},{0,1,0,1,0},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1}}	},
	{'B',{{1,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,0}} },
	{'C', {{0,0,1,1,1},{0,1,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{0,1,0,0,0},{0,0,1,1,1}} },
	{'D',{{1,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,0}} },
	{'E',{{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1}} },
	{'F', {{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0}} },
	{'G', {{0,0,1,1,1},{0,1,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,1,1,1},{1,0,0,0,1},{0,1,1,1,0}} },
	{'H', {{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1}} },
	{'I',{{1,1,1,1,1},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{1,1,1,1,1}} },
    {'J',{{1,1,1,1,1},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{1,0,1,0,0},{0,1,1,0,0}} },
    {'K',{{1,0,0,0,1},{1,0,0,1,0},{1,0,1,0,0},{1,1,0,0,0},{1,0,1,0,0},{1,0,0,1,0},{1,0,0,0,1}} },
    {'L',{{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1}} },
    {'M',{{1,0,0,0,1},{1,1,0,1,1},{1,0,1,0,1},{1,0,1,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1}} },
    {'N',{{1,0,0,0,1},{1,1,0,0,1},{1,0,0,0,1},{1,0,1,0,1},{1,0,0,0,1},{1,0,0,1,1},{1,0,0,0,1}} },
    {'O',{{0,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{0,1,1,1,0}} },
    {'P',{{1,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,1},{1,0,0,0,0},{1,0,0,0,0},{1,0,0,0,0}} },
    {'Q',{{0,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{0,1,1,1,0},{0,0,1,0,0},{0,0,0,1,0},{0,0,0,0,1}} },
    {'R',{{0,1,1,1,0},{1,0,0,0,1},{1,0,0,0,1},{1,1,1,1,0},{1,0,1,0,0},{1,0,0,1,0},{1,0,0,0,1}} },
    {'S',{{0,1,1,1,0},{1,0,0,0,0},{1,0,0,0,0},{0,1,1,1,0},{0,0,0,1,0},{0,0,0,1,0},{1,0,1,0,0}} },
    {'T',{{1,1,1,1,1},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0}} },
    {'U',{{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{0,1,1,1,0}} },
    {'V',{{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{0,1,0,1,0},{0,0,1,0,0}} },
    {'W',{{1,0,0,0,1},{1,0,0,0,1},{1,0,0,0,1},{1,0,1,0,1},{1,0,0,0,1},{1,1,0,1,1},{1,0,0,0,1}} },
    {'X',{{1,0,0,0,1},{0,1,0,1,0},{0,0,1,0,0},{0,0,1,0,0},{0,1,0,1,0},{1,0,0,0,1},{1,0,0,0,1}} },
    {'Y',{{1,0,0,0,1},{0,1,0,1,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0},{0,0,1,0,0}} },
    {'Z',{{1,1,1,1,1},{0,0,0,1,0},{0,0,1,0,0},{0,1,0,0,0},{1,0,0,0,0},{1,0,0,0,0},{1,1,1,1,1}} }
 };

 int attemptassignment(){
    strcpy(query1, "SELECT char1, char2, char3, char4, char5, char6, char7, char8 FROM assignment WHERE assignNo = \'");
    strcat(query1, ID);
    strcat(query1,"\'");
    if(mysql_query(conn,query1)==0){
    res=mysql_use_result(conn);
    while((row=mysql_fetch_row(res))!=NULL){
    printf("\nATTEMPT ASSIGNMENT");
	printf("\n");

	char LET[]="0";
    int a=0;
    strcpy(LET,row[a]);
    for(a=1;a<8;a++){
        if(row[a]!=NULL){
          strcat(LET,row[a]);
     }
    }

    printf("This assignment has %d characters.\n\n", strlen(LET));
	printf("Guiding grid box\n");
	for(int x=0;x<7;x++){
		for(int y=0;y<5;y++){
			printf("[%d%d]", x,y);
		}
		printf("\n");
	}
	printf("\n");
	puts("Enter 1 or 0 at each of the co-ordinates");

    for(a=0;a<strlen(LET);a++){
    printf("%c\n",LET[a]);

      for(i=0;i<7;i++){
      for(j=0;j<5;j++){
        printf("Input at [%d%d]: ",i,j);
        scanf("%d", &k[i][j]);
          for(n=0;n<26;n++){
 	      if(alphabet_array[n].letter==LET[a]){
            if(alphabet_array[n].position[i][j]==k[i][j]){
               score+=1;
		 }
	 }
    }
        }
      }
      printf("\n");

      for(i=0;i<7;i++){
      for(j=0;j<5;j++){
          if(k[i][j]==1){
            printf("*");
          }
          else if(k[i][j]==0){
            printf(" ");
          }
          else{
            printf("invalid");
          }
      }
      printf("\n");
      }
    }

      strcpy(sqlquery, "INSERT INTO result(assignNo, Usercode, score) VALUES (\')");
      strcat(sqlquery, ID);
      strcat(sqlquery,"\', \'");
      strcat(sqlquery, code);
      strcat(sqlquery, "\', \'");
      strcat(sqlquery, score);
      strcat(sqlquery,"\')");
      if(mysql_query(conn,sqlquery)!=0){
      fprintf(stdout,"Score not updated!");
      }
      else{
      printf("Score updated.");
      }
    }
    mysql_free_result(res);
    }
    return score;
}

void viewall(){
    strcpy(query2, "SELECT assignNo, startdate, startTime, endTime, closedate FROM assignment");
    if(mysql_query(conn,query2)==0){
    res=mysql_use_result(conn);
    while((row=mysql_fetch_row(res))!=NULL){
    printf("%s\t%s\t%s\t%s\t%s\n", row[0],row[1],row[2],row[3],row[4]);
    }
    mysql_free_result(res);
    }
}

void status();

void assignmentID(){
    strcpy(query3, "SELECT startdate, startTime, endTime, closedate FROM assignment WHERE assignNo = \'");
    strcat(query3, ID);
    strcat(query3,"\'");
    if(mysql_query(conn,query3)==0){
    res=mysql_use_result(conn);
    while((row=mysql_fetch_row(res))!=NULL){
    printf("\n%s\t%s\t%s\t%s\n", row[0],row[1],row[2],row[3]);
    }
    mysql_free_result(res);
}
}

void checkdate(){
    strcpy(query4, "SELECT assignNo, startdate, startTime, endTime, closedate FROM assignment WHERE startdate BETWEEN \'");
    strcat(query4, datefrom);
    strcat(query4,"\'");
    strcat(query4, "AND \'");
    strcat(query4, dateto);
    strcat(query4,"\'");
    if(mysql_query(conn,query4)==0){
    res=mysql_use_result(conn);
    while((row=mysql_fetch_row(res))!=NULL){
    printf("\n%s\t%s\t%s\t%s\t%s\n", row[0],row[1],row[2],row[3],row[4]);
    }
    mysql_free_result(res);
    }
}

void request(){
    char firstname[10];
    puts("enter your firstname= ");
    scanf("%s", firstname);

    strcpy(query6, "INSERT INTO request(Usercode, Firstname) VALUES (\'");
    strcat(query6, code);
    strcat(query6,"\', \'");
    strcat(query6, firstname);
    strcat(query6,"\')");
    if(mysql_query(conn,query6)!=0){
    fprintf(stdout,"Not sent!");
    }
    else{
    printf("Request sent.");
    }
}

int main()
{
    conn = mysql_init(0);
    conn = mysql_real_connect(conn, "localhost", "root", "", "kccd", 0, NULL, 0);
    if(conn){
        printf("Connected\n");
    }
    else{
        printf("Not connected\n");
    }

    do{
    printf("Login with usercode: ");
    scanf("%s", code);
    strcpy(sqlquery, "SELECT Firstname FROM pupil WHERE Usercode = \'");
    strcat(sqlquery, code);
    strcat(sqlquery,"\'");
    mysql_query(conn,sqlquery);
    res = mysql_store_result(conn);
    rec = mysql_num_rows(res);
    if(rec == 0)
    fprintf(stdout,"Unknown usercode!\n");
    }while(rec==0);

        while((row=mysql_fetch_row(res))!=NULL){
            printf("\nWelcome to your account %s.\n", row[0]);
            mysql_free_result(res);

        printf("\n===============DASHBOARD===============\n");
        printf("Command options:\n");
        printf("1.Attempt Assignment\t\t- attempt an open assignment.\n");
        printf("2.Viewall\t\t\t- see all your assignments both attempted and unattempted with their IDs and times.\n");
        printf("3.Checkstatus\t\t\t- see your status reports\n");
        printf("4.View assignment[assignment ID]- see the assignment details of the specified assignment ID.\n");
        printf("5.Checkdates[datefrom dateto]\t- see any assignments within the specified time range.\n");
        printf("6.Requestactivation\t\t- request for activation in case you are deactivated.\n");
        printf("7.Log out\n");
        do{
        printf("\nEnter command number: ");
        scanf("%d", &com);
        if(com==1){
            printf("Enter assignment ID: ");
            scanf("%s", ID);
            fgetc(stdin);
            attemptassignment();
            printf("Your Score= %d.", score);
        }
        else if(com==2){
            viewall();
        }
        else if(com==4){
            printf("Enter assignment ID: ");
            scanf("%s", ID);
            fgetc(stdin);
            assignmentID();
        }
        else if(com==5){
            printf("Datefrom(yy-mm-dd): ");
            gets(datefrom);
            printf("Dateto(yy-mm-dd): ");
            gets(dateto);
            checkdate();
        }
        else if(com==6){
            request();
        }
        else if(com==7){
            exit(1);
        }
        else{
            printf("Invalid option!");
        }

        printf("\n===============Back to Dashboard(Press 9): ");
        scanf("%d", &choice);
        }while(choice==9);
    }

}


