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
 in a perfectly balanced tree with 1023 nodes, all the leaves are at depth 9. In an approximately balanced tree with 1023 nodes, the average depth of all the leaves should be not too much bigger than 9.

The height of a tree is defined to be the maximum depth of any node in the tree.

## 走査

Using the principles of recursion (considering the base case of an empty tree, then counting the nodes in the two subtrees), you can sum the nodes in the tree, print the items in the tree, and so forth.

* Preorder traversal
    * ルートノードが最初に走査される。そして左の木、右の木という順で走査される。
* Postorder traversal
    * 左の木が最初に走査され。次に右の木が走査され、最後にルートノードが走査される。
* Inorder traversal
    * 左の木が先に走査され、次にルートノードが走査され、最後に右の木が走査される。

## バイナリソートツリー

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


