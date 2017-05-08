#define _WINSOCK_DEPRECATED_NO_WARNINGS
#define _AFXDLL
#include <stdio.h>
#include <stdlib.h>
#include <string>
#include <string.h>
#include <cstring>
#include <iostream>
#include <fstream>
#include <afxinet.h>
//#include "windows.h"
#include "winsock2.h"

//#include "downdata.h"
//#include "freeptr.h"

#define BUFFSIZE_H 1024

#pragma comment(lib, "ws2_32.lib")
using namespace std;

void freeCharPtr(char ** ch, ...)
{
	va_list ap;
	char **  p;

	va_start(ap, ch);
	free(*ch);
	*ch = NULL;
	while (p = va_arg(ap, char **))
	{
		free(*p);
		*p = NULL;
	}
}

bool WEBQuest(char*  result,int siz)
{
	WSADATA WsaData;
	if (WSAStartup(MAKEWORD(2, 2), &WsaData))
	{
		printf("The socket failed");
		return false;
	}
	SOCKET sockeId;
	SOCKADDR_IN addr;
	if (-1 == (sockeId = socket(AF_INET, SOCK_STREAM, 0)))
	{
		printf("socket create failed\n");
		return false;
	}

	//> dest_addr
	addr.sin_addr.s_addr = inet_addr("120.76.144.210"); 
	addr.sin_family = AF_INET;
	addr.sin_port = htons(80);


	char * head = (char *)malloc(102400 * sizeof(char));
	memset(head, '\0', 102400);

	FILE *fp;
	fp = fopen("1.txt", "r+");
	char * c = (char *)malloc(BUFFSIZE_H * sizeof(char));
	memset(c, '\0', BUFFSIZE_H);
	while (fscanf(fp, "%c", c) == 1) {
		strcat(head, c);
	}
	fclose(fp);
	//printf(head);

	char sSize[5];
	siz += 19;
	_itoa(siz,sSize,10);
	strcat(head,sSize);
	strcat(head,"\n");
	FILE *fpp;
	fpp = fopen("2.txt", "r+");
	memset(c, '\0', BUFFSIZE_H);
	while (fscanf(fpp, "%c", c) == 1) {
		strcat(head, c);
	}
	fclose(fpp);
	
	char * req = (char *)malloc(1024 * sizeof(char));
	memset(req, '\0', 1024);
	strcat(req,"par1=");
	strcat(req, result);
	strcat(req, "&submit=submit");
	strcat(head, req);


	printf(head);
	if (SOCKET_ERROR == connect(sockeId, (SOCKADDR *)&addr, sizeof(addr)))
	{
		printf("connect failed!\n");
		closesocket(sockeId);
		WSACleanup();
		freeCharPtr(&head, NULL);
		return false;
	}
	if (SOCKET_ERROR == send(sockeId, head, strlen(head), 0))
	{
		printf("send &header error!\n");
		closesocket(sockeId);
		WSACleanup();
		return false;
	}
	memset(head, '\0', 102400);
	while (recv(sockeId, head, 102400, 0) > 0)
	{
		//fputs(head, fp);
		//printf(head);
		//printf(head); printf("\n\n");
		//memset(head, '\0',102400);
	}

	freeCharPtr(&head, NULL);
	closesocket(sockeId);
	WSACleanup();

	return true;
}

int main(void)
{
	
	
	//printf("请输需要读取的目录文件名路径：\n");
	//char folder[300];
	//scanf("%s",folder);
	char *folder = "D:\\Documents\\Visual Studio 2015\\Projects\\caffeTest1-0424\\caffeTest1-0424\\result.txt";

	FILE *fp= fopen(folder,"r");
	int temp = -1;
	while (1) {
		rewind(fp);
		int sum;
		fscanf(fp,"%d",&sum);
		if (sum != temp) {
			Sleep(10000);
			double f;
			fscanf(fp,"%f",&f);
			char c;
			fscanf(fp, "%c", &c);
			while (c != '\"') {
				fscanf(fp, "%c", &c);
			}
			while (c != ' ') {
				fscanf(fp, "%c", &c);
			}
			fscanf(fp, "%c", &c);
			string s;
			//char *s;
			int i = 0;
			while (c != '\"' && c != ',') {
				s += c;
				//s[i] = c;
				i++;
				fscanf(fp, "%c", &c);
			}
			//s[i] = '\0';
			//cout << s << endl;
			int len = s.length();
			char *ss = (char *)malloc((len + 1) * sizeof(char));
			
			for (i = 0; i < len; i++) {
				ss[i] = s.at(i);
			}
			ss[i] = '\0';
		   // const  char *ss = s.c_str();
			cout << ss << endl;
			int siz = sizeof(ss);
			cout << siz << endl;
			WEBQuest(ss, len);
		}
		temp = sum;
		
	}
}
