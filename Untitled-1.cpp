#include <cmath>
#include <cstdio>
#include <vector>
#include <iostream>
#include <algorithm>
using namespace std;


int main() {
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */ 
    int n;
    int a[n];
    cin>>n;
    for(int i=0;i<n;i++){
        cin>>a[i];
    } 
    for(int i=n;i>=0;i--){
      printf("%d ",a[i]);
    }
    return 0;
}
