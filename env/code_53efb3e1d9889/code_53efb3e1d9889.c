#include <stdio.h>
struct node
{
	int data;
	struct node *next;
};
// Program to create a simple linked list with 3 nodes
int main()
{
	struct node *head= NULL;
	struct node *second=NULL;
	struct node *third= NULL;
	
	 // allocate 3 nodes in the heap  
	 head=(struct node*)malloc(sizeof(struct node));
	 second=(struct node*)malloc(sizeof(struct node));
	 third=(struct node*)malloc(sizeof(struct node)); 
	 
	 
	 head->data=1;			//assign data in first node
	 head->next=second;		// Link first node with the second node
	 
	 second->data=2;		// assign data in second node
	 second->next=third;	// Link second node with the third node
	 
	 third->data=3;
	 third->next=NULL;
	 
	 getchar();
	 
	return 0;
}
