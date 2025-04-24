//
ket not voi tk git

    git config --global user.name "Tên của bạn"
    git config --global user.email "email@example.com"

Khởi tạo repo mới : 
    
    git init

Clone repo từ GitHub:

    git clone duongdan

Thêm file vào staging area
    
    git add . //all
    git add tenfile.txt 

thay doi ghi chu: git commit -m "ghi chu"
thay doi ghi chu gan nhat: git commit --amend

Tạo nhánh mới và chuyển sang: 

    git branch ten-nhanh       # tạo nhánh
    git checkout ten-nhanh     # chuyển sang nhánh đó
Gộp nhánh:
    
    git checkout main              # về nhánh chính
    git merge ten-nhanh           # gộp nhánh phụ vào main

Đẩy code lên GitHub:
    
    git remote add origin https://github.com/ten-user/ten-repo.git
    git push -u origin main

Kéo code mới nhất từ GitHub: git pull

cac truong hop loi:

1:  error: failed to push some refs to 'https://github.com/Bach2910/my-note.git'
    hint: Updates were rejected because a pushed branch tip is behind its remote
    hint: counterpart. If you want to integrate the remote changes, use 'git pull'
    hint: before pushing again.
    hint: See the 'Note about fast-forwards' in 'git push --help' for details.

Giai phap:

    git pull origin Bach2910/task4 --rebase
    git push origin Bach2910/task4

2: fatal: It seems that there is already a rebase-merge directory, and
I wonder if you are in the middle of another rebase.  If that is the
case, please try    

Giai Phap:
+ cach 1: Nếu bạn muốn tiếp tục quá trình rebase:

        git rebase --continue

+ cach 2: Nếu bạn muốn hủy rebase và quay lại như cũ:

      git rebase --abort
Cuoi cung la 
    
    git pull --rebase origin Bach2910/task4

3: interactive rebase in progress; onto 41bd83e
You are currently editing a commit while rebasing branch 'Bach2910/task4' on '41bd83e'.


nghia dang trong qua trinh rebase va can xac nhan:
    
- Cach xac nhan: 
    
        git rebase --continue
- sau do push lai

4: $ git merge Bach2910/task12
merge: Bach2910/task12 - not something we can merge

xuất hiện vì Git không nhận ra Bach2910/task12 là một nhánh hợp lệ trong local hoặc remote.

cách sửa:
Bước 1: Kiểm tra danh sách nhánh hiện có

    git branch        # xem các nhánh local
    git branch -r     # xem các nhánh remote
Bước 2:  Tải nhánh task12 từ remote (nếu có)

    git fetch origin Bach2910/task12:Bach2910/task12
sau đó merge
    
    git merge tennhanh
5:fatal: refusing to merge unrelated histories(xuất hiện khi bạn đang merge hai nhánh có lịch sử commit hoàn toàn khác nhau)
Giải quyết:

    git merge Bach2910/task12 --allow-unrelated-histories

