---
layout: page
---

# Binary Tree (2分木)

## バイナリツリーとは

* ツリー構造で、すべてのノードの持つ子が最大でも2つ。
* ひとつのノードがあり、親をもたない (ルートノード)
* ルートノードを除く全てのノードは親を必ずひとつ持つ。
* ノード間の親子関係は循環しない。

## 用語

* leaf - 末端のノード

* depth (深さ)
    * ルートノードからの距離。 ルートノードは深さ 0.
    * バランス木では、全ての葉はほぼ同じ深さとなる。
        * たとえば 1023 のノードからなるツリーの葉はすべて深さ9.
* height (高さ)
    * 木の中の葉の深さのうち、最大のもの。

## 走査

* Preorder traversal
    * ルートノードが最初に走査される。そして左の木、右の木という順で走査される。
* Postorder traversal
    * 左の木が最初に走査され。次に右の木が走査され、最後にルートノードが走査される。
* Inorder traversal
    * 左の木が先に走査され、次にルートノードが走査され、最後に右の木が走査される。

## バイナリソートツリー Binary Sort Tree

* バイナリツリー。
* ノードの左にはノードよりも小さい値が、右にはノードと同じかそれ以上の値が入る。

<!--
Some applications of binary search trees:
An inorder traversal of the tree will process the items in increasing order.
Suppose that we want to search for a given item in a binary search tree. Compare that item to the root item of the tree. If they are equal, we're done. If the item we are looking for is less than the root item, then we need to search the left subtree of the root -- the right subtree can be eliminated because it only contains items that are greater than or equal to the root. Similarly, if the item we are looking for is greater than the item in the root, then we only need to look in the right subtree.
Inserting a new item is similar: Start by searching the tree for the position where the new item belongs. When that position is found, create a new node and attach it to the tree at that position.
Expression Trees
Another application of trees is to store mathematical expressions such as 15*(x+y) or sqrt(42)+7 in a convenient form. 
-->

少数の要素であれば Linked List でも序列を保ったまま操作可能だが、 要素が多くなると非効率になる。
リストに要素を追加した後でその位置を調べる場合、平均でリスト内の半分の要素を調べることになる。

ソートされた配列であればバイナリサーチを使うことができて効率的だが、新しい要素を追加する際には要素の移動を伴うため非効率である。
平均では新しい要素を追加する際に、既存の要素の半分を移動させる必要がある。

バイナリツリーは探索と挿入を効率的にできる構造として使われ、そのようなバイナリツリーを特にバイナリソートツリー(Binary Sort Tree, Binary Search Tree, 2分探索木)という。

* 左の木にはそのノード以下の値が入る。
* 右の木にはそのノード以上の値が入る。

<!--
A binary sort tree

Binary sort trees have this useful property: An inorder traversal of the tree will process the items in increasing order. In fact, this is really just another way of expressing the definition. For example, if an inorder traversal is used to print the items in the tree shown above, then the items will be in alphabetical order. The definition of an inorder traversal guarantees that all the items in the left subtree of "judy" are printed before "judy", and all the items in the right subtree of "judy" are printed after "judy". But the binary sort tree property guarantees that the items in the left subtree of "judy" are precisely those that precede "judy" in alphabetical order, and all the items in the right subtree follow "judy" in alphabetical order. So, we know that "judy" is output in its proper alphabetical position. But the same argument applies to the subtrees. "Bill" will be output after "alice" and before "fred" and its descendents. "Fred" will be output after "dave" and before "jane" and "joe". And so on.

 A binary tree is balanced if for each node, the left subtree of that node contains approximately the same number of nodes as the right subtree. In a perfectly balanced tree, the two numbers differ by at most one. Not all binary trees are balanced, but if the tree is created by inserting items in a random order, there is a high probability that the tree is approximately balanced. (If the order of insertion is not random, however, it's quite possible for the tree to be very unbalanced.) During a search of any binary sort tree, every comparison eliminates one of two subtrees from further consideration. If the tree is balanced, that means cutting the number of items still under consideration in half. This is exactly the same as the binary search algorithm, and the result is a similarly efficient algorithm.

In terms of asymptotic analysis (Section 8.5), searching, inserting, and deleting in a binary search tree have average case run time Θ(log(n)). The problem size, n, is the number of items in the tree, and the average is taken over all the different orders in which the items could have been inserted into the tree. As long as the actual insertion order is random, the actual run time can be expected to be close to the average. However, the worst case run time for binary search tree operations is Θ(n), which is much worse than Θ(log(n)). The worst case occurs for particular insertion orders. For example, if the items are inserted into the tree in order of increasing size, then every item that is inserted moves always to the right as it moves down the tree. The result is a "tree" that looks more like a linked list, since it consists of a linear string of nodes strung together by their right child pointers. Operations on such a tree have the same performance as operations on a linked list. Now, there are data structures that are similar to simple binary sort trees, except that insertion and deletion of nodes are implemented in a way that will always keep the tree balanced, or almost balanced. For these data structures, searching, inserting, and deleting have both average case and worst case run times that are Θ(log(n)). Here, however, we will look at only the simple versions of inserting and searching.

The sample program SortTreeDemo.java is a demonstration of binary sort trees. The program includes subroutines that implement inorder traversal, searching, and insertion. We'll look at the latter two subroutines below. The main() routine tests the subroutines by letting you type in strings to be inserted into the tree.
-->
