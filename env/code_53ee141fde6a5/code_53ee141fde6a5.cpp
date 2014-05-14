#include<cstdio>
#include<cstring>
#include<algorithm>
#include<set>
using namespace std;
#define SUBSET_LENGTH 3

void generateSubset(int array[], int subset[], int used[], int length, int index, int lastoffset)
{
int k;

if (index == SUBSET_LENGTH)
{
printf("subset %d%d%d\n", subset[0], subset[1], subset[2]);
return;
}

for (k = 0; k < length; k++)
{
if (used[k]) continue;
if (k < lastoffset) continue;
subset[index] = array[k];
used[k] = 1;
generateSubset(array, subset, used, length, index + 1, k);
used[k] = 0;
}
}

int main()
{
int array[4] = {1, 2, 3, 4};
int used[4];
int subset[SUBSET_LENGTH];

memset((void *)used, 0, sizeof(array)/sizeof(int));
memset((void *)subset, 0, SUBSET_LENGTH);

generateSubset(array, subset, used, sizeof(array)/sizeof(int), 0, 0);

return 0;
}